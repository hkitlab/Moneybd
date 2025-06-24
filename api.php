<?php
// A single API file to handle all requests

// Basic Headers
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // For production, use your specific domain e.g., https://your-app.netlify.app
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// --- DATABASE CONNECTION ---
$servername = "localhost";
$username = "mopcashc_money_app"; // cPanel থেকে পাওয়া ইউজারনেম
$password = "mopcashc_money_app"; // cPanel থেকে পাওয়া পাসওয়ার্ড
$dbname = "mopcashc_money_app";   // cPanel থেকে পাওয়া নাম

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]);
    exit();
}

// Get the incoming request data
$data = json_decode(file_get_contents("php://input"));
$action = $data->action ?? '';

// --- ROUTER: Decide what to do based on the 'action' parameter ---

switch ($action) {
    case 'login_register':
        handle_login_register($conn, $data);
        break;
    case 'upload_file':
        handle_file_upload($conn, $data);
        break;
    case 'complete_kyc':
        handle_complete_kyc($conn, $data);
        break;
    default:
        echo json_encode(["success" => false, "message" => "Invalid action specified."]);
        break;
}

$conn->close();

// --- FUNCTION DEFINITIONS ---

function handle_login_register($conn, $data) {
    $email = $data->email ?? '';
    $password = $data->password ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(["success" => false, "message" => "Email and password are required."]);
        return;
    }

    // Check if user exists
    $stmt = $conn->prepare("SELECT uid, email, password_hash, kycStatus, balance FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        // User exists, try to log in
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password_hash'])) {
            echo json_encode(["success" => true, "type" => "login", "message" => "Login successful.", "userData" => $user]);
        } else {
            echo json_encode(["success" => false, "message" => "Invalid credentials."]);
        }
    } else {
        // User does not exist, register them
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $uid = uniqid('user_', true); // Generate a unique ID

        $insert_stmt = $conn->prepare("INSERT INTO users (uid, email, password_hash) VALUES (?, ?, ?)");
        $insert_stmt->bind_param("sss", $uid, $email, $password_hash);
        
        if ($insert_stmt->execute()) {
            $newUser = ["uid" => $uid, "email" => $email, "kycStatus" => "pending", "balance" => 0.00];
            echo json_encode(["success" => true, "type" => "register", "message" => "Registration successful.", "userData" => $newUser]);
        } else {
            echo json_encode(["success" => false, "message" => "Registration failed."]);
        }
        $insert_stmt->close();
    }
}

function handle_file_upload($conn, $data) {
    $uid = $data->uid ?? '';
    $fileData = $data->file ?? '';
    $type = $data->type ?? ''; // nid_front, nid_back, selfie, signature

    if (empty($uid) || empty($fileData) || empty($type)) {
        echo json_encode(["success" => false, "message" => "Missing required data for upload."]);
        return;
    }

    // Create user's directory if it doesn't exist
    $upload_dir = 'uploads/' . $uid . '/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Decode Base64 string and save file
    if (preg_match('/^data:image\/(\w+);base64,/', $fileData, $type_info)) {
        $fileData = substr($fileData, strpos($fileData, ',') + 1);
        $file_extension = strtolower($type_info[1]); // e.g., 'jpeg', 'png'
        $fileData = base64_decode($fileData);
        
        if ($fileData === false) {
            echo json_encode(["success" => false, "message" => "Base64 decode failed."]);
            return;
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid data URL."]);
        return;
    }
    
    $fileName = $type . '.' . $file_extension;
    $filePath = $upload_dir . $fileName;

    if (file_put_contents($filePath, $fileData)) {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        $fileUrl = $protocol . $domainName . '/' . $filePath;
        
        $column_name = $type . '_url';
        
        $stmt = $conn->prepare("UPDATE users SET $column_name = ? WHERE uid = ?");
        $stmt->bind_param("ss", $fileUrl, $uid);
        
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Upload successful.", "url" => $fileUrl]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to update database."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "File upload failed on server."]);
    }
}


function handle_complete_kyc($conn, $data) {
    $uid = $data->uid ?? '';
    $pin = $data->pin ?? '';

    if (empty($uid) || empty($pin)) {
        echo json_encode(["success" => false, "message" => "PIN and UID are required."]);
        return;
    }

    $pin_hash = password_hash($pin, PASSWORD_BCRYPT); // Hashing the PIN for security

    $stmt = $conn->prepare("UPDATE users SET pin = ?, kycStatus = 'verified' WHERE uid = ?");
    $stmt->bind_param("ss", $pin_hash, $uid);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "KYC complete!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to update your account."]);
    }
    $stmt->close();
}

?>
