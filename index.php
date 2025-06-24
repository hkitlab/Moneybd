<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money - Account Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/lucide-static@latest/dist/lucide.min.js"></script>

    <style>
        body { font-family: 'Noto Sans Bengali', sans-serif; background-color: #f0f2f5; }
        .main-container { max-width: 420px; margin: 0 auto; background-color: #ffffff; min-height: 100vh; box-shadow: 0 0 20px rgba(0,0,0,0.05); }
        .bkash-pink { color: #e2136e; }
        .bkash-pink-bg { background-color: #e2136e; }
        .form-input { border: 1px solid #ddd; border-radius: 8px; padding: 12px; margin-top: 8px; width: 100%; }
        .form-btn { width: 100%; padding: 12px; border-radius: 8px; margin-top: 16px; color: white; font-weight: bold; }
        #signature-canvas { border: 2px dashed #ccc; border-radius: 8px; cursor: crosshair; }
        .file-input-label { border: 2px dashed #e2136e; padding: 2rem; border-radius: 8px; cursor: pointer; text-align:center; }
    </style>
</head>
<body class="bg-gray-200">
    <div class="main-container">
        <div id="loading-spinner" class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center z-50 hidden">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-pink-600"></div>
        </div>
        <div id="message-box" class="fixed top-5 right-5 text-white p-3 rounded-lg shadow-lg z-50 hidden"></div>
        
        <div id="welcome-screen" class="screen p-8 flex flex-col items-center justify-center h-screen">
            <img src="https://img.icons8.com/ios-filled/50/e2136e/b.png" alt="Logo" class="w-20 h-20 mx-auto mb-6">
            <h1 class="text-3xl font-bold text-gray-700">Money App-এ স্বাগতম</h1>
            <p class="text-gray-500 mt-2 mb-8">আপনার বিশ্বস্ত ডিজিটাল ওয়ালেট</p>
            <button id="start-reg-btn" class="form-btn bkash-pink-bg">লগ ইন / রেজিস্ট্রেশন</button>
        </div>

        <div id="login-screen" class="screen hidden p-6">
            <h2 class="text-xl font-bold mb-4">লগ ইন বা রেজিস্টার করুন</h2>
            <form id="login-form">
                <input type="email" id="email-input" class="form-input" placeholder="আপনার ইমেল দিন" required>
                <input type="password" id="password-input" class="form-input" placeholder="আপনার পাসওয়ার্ড দিন" required>
                <p class="text-xs text-gray-500 text-center mt-4">
                    আপনার অ্যাকাউন্ট না থাকলে, এই তথ্য দিয়ে একটি নতুন অ্যাকাউন্ট তৈরি হয়ে যাবে।
                </p>
                <button type="submit" class="form-btn bkash-pink-bg">এগিয়ে যান</button>
            </form>
        </div>

        <div id="kyc-start-screen" class="screen hidden p-6 text-center">
             <h2 class="text-2xl font-bold mb-4">অ্যাকাউন্ট ভেরিফিকেশন</h2>
             <p class="text-gray-600 mb-6">আপনার অ্যাকাউন্টের নিরাপত্তার জন্য, আমাদের কিছু তথ্য দিয়ে সাহায্য করুন।</p>
             <ul class="text-left list-disc list-inside mb-6 mx-auto max-w-sm">
                 <li>জাতীয় পরিচয়পত্র (NID)</li>
                 <li>আপনার একটি সেলফি</li>
                 <li>আপনার ডিজিটাল স্বাক্ষর</li>
             </ul>
             <button id="kyc-start-btn" class="form-btn bkash-pink-bg">শুরু করুন</button>
        </div>

        <div id="privacy-policy-screen" class="screen hidden p-6">
             <h2 class="text-xl font-bold mb-4">Privacy Policy</h2>
             <div class="h-64 overflow-y-auto border p-3 rounded-lg text-sm text-gray-600">
                 <p>আপনার ব্যক্তিগত তথ্যের গোপনীয়তা রক্ষা করা আমাদের জন্য অত্যন্ত গুরুত্বপূর্ণ... (এখানে আপনার প্রাইভেসি পলিসি থাকবে)</p>
             </div>
             <button id="agree-policy-btn" class="form-btn bkash-pink-bg mt-4">আমি সম্মত</button>
        </div>

        <div id="nid-front-screen" class="screen hidden p-6 text-center">
            <h2 class="text-xl font-bold mb-4">NID-এর সামনের অংশের ছবি দিন</h2>
            <label for="nid-front-input" class="file-input-label bkash-pink">ছবি আপলোড করুন</label>
            <input type="file" id="nid-front-input" accept="image/*" class="hidden">
            <img id="nid-front-preview" class="mt-4 rounded-lg hidden w-full">
        </div>
        <div id="nid-back-screen" class="screen hidden p-6 text-center">
            <h2 class="text-xl font-bold mb-4">NID-এর পেছনের অংশের ছবি দিন</h2>
             <label for="nid-back-input" class="file-input-label bkash-pink">ছবি আপলোড করুন</label>
            <input type="file" id="nid-back-input" accept="image/*" class="hidden">
            <img id="nid-back-preview" class="mt-4 rounded-lg hidden w-full">
        </div>
        <div id="selfie-screen" class="screen hidden p-6 text-center">
            <h2 class="text-xl font-bold mb-4">আপনার একটি সেলফি তুলুন</h2>
            <p class="text-gray-500 mb-4">পরিষ্কার আলোতে, চশমা ছাড়া ছবি তুলবেন।</p>
            <label for="selfie-input" class="file-input-label bkash-pink">সেলফি তুলুন</label>
            <input type="file" id="selfie-input" accept="image/*" capture="user" class="hidden">
            <img id="selfie-preview" class="mt-4 rounded-lg hidden w-full">
        </div>
        <div id="signature-screen" class="screen hidden p-6">
            <h2 class="text-xl font-bold mb-4 text-center">আপনার স্বাক্ষর দিন</h2>
            <canvas id="signature-canvas" width="350" height="200" class="w-full"></canvas>
            <div class="flex gap-4 mt-4">
                <button id="clear-signature-btn" class="w-1/2 form-btn bg-gray-500">মুছে ফেলুন</button>
                <button id="submit-signature-btn" class="w-1/2 form-btn bkash-pink-bg">জমা দিন</button>
            </div>
        </div>
        <div id="pin-screen" class="screen hidden p-6">
             <h2 class="text-xl font-bold mb-4">সিকিউরিটি পিন সেট করুন</h2>
            <form id="pin-form">
                <input type="password" id="pin-input" pattern="\d{4}" class="form-input text-center" placeholder="৪-ডিজিটের পিন" required>
                <input type="password" id="confirm-pin-input" class="form-input mt-4 text-center" placeholder="পিনটি আবার দিন" required>
                <button type="submit" class="form-btn bkash-pink-bg">অ্যাকাউন্ট তৈরি করুন</button>
            </form>
        </div>
        <div id="app-screen" class="screen hidden">
            <header class="p-4 flex justify-between items-center bg-white sticky top-0 z-20 shadow-sm">
                <div class="flex items-center gap-3">
                    <img src="https://placehold.co/48x48/e2136e/white?text=U" alt="User" class="rounded-full w-12 h-12 border-2 border-pink-100">
                    <div>
                        <p id="user-name" class="font-bold text-gray-800">Loading...</p>
                        <button id="logout-btn" class="text-xs bkash-pink">Logout</button>
                    </div>
                </div>
                <img src="https://img.icons8.com/ios-filled/50/e2136e/b.png" alt="bKash Logo" class="w-10 h-10">
            </header>
            <section class="px-4 py-3 bg-white border-t border-b border-gray-200">
                <div id="balance-view" class="flex justify-between items-center p-3 rounded-lg bg-gray-50">
                    <p class="text-gray-500 text-sm">Available Balance: <span id="balance-amount" class="text-2xl font-bold text-gray-800">৳0.00</span></p>
                </div>
            </section>
            <main class="p-4">
                 <p class="col-span-4 text-center text-gray-500 mt-8">Send Money, Cash Out and other features coming soon...</p>
            </main>
        </div>
    </div>

    <script>
    function initApp() {
        // --- API URL ---
        const API_URL = 'api.php'; // The single API file

        // --- DOM Elements ---
        const screens = document.querySelectorAll('.screen');
        const loadingSpinner = document.getElementById('loading-spinner');
        const messageBox = document.getElementById('message-box');
        
        // --- State Variables ---
        let currentUser = null; // Will hold { uid, email, kycStatus, balance }

        // --- Helper Functions ---
        function showScreen(screenId) {
            screens.forEach(s => s.classList.add('hidden'));
            document.getElementById(screenId)?.classList.remove('hidden');
            window.scrollTo(0, 0);
        }
        function showLoading(show) {
            loadingSpinner?.classList.toggle('hidden', !show);
        }
        function showMessage(msg, isError = false) {
            messageBox.textContent = msg;
            messageBox.classList.remove('hidden', 'bg-red-500', 'bg-green-500');
            messageBox.classList.add(isError ? 'bg-red-500' : 'bg-green-500');
            setTimeout(() => messageBox.classList.add('hidden'), 5000);
        }
        
        // --- Step 1: Email/Password Auth ---
        document.getElementById('start-reg-btn')?.addEventListener('click', () => {
            showScreen('login-screen');
        });
        
        document.getElementById('login-form')?.addEventListener('submit', async (e) => {
            e.preventDefault();
            showLoading(true);
            const email = document.getElementById('email-input').value;
            const password = document.getElementById('password-input').value;
            
            try {
                const response = await fetch(API_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'login_register', email, password })
                });
                const result = await response.json();
                showLoading(false);

                if (result.success) {
                    currentUser = result.userData;
                    if (currentUser.kycStatus === 'verified') {
                        setupAppForUser(currentUser);
                        showScreen('app-screen');
                    } else {
                        showScreen('kyc-start-screen');
                    }
                } else {
                    showMessage(result.message, true);
                }
            } catch (error) {
                showLoading(false);
                showMessage('An error occurred. Please try again.', true);
                console.error('Login/Register Error:', error);
            }
        });

        // Step 2: KYC Process
        document.getElementById('kyc-start-btn')?.addEventListener('click', () => showScreen('privacy-policy-screen'));
        document.getElementById('agree-policy-btn')?.addEventListener('click', () => {
            showScreen('nid-front-screen');
        });

        async function handleFileUpload(file, type) {
            if (!file) { showMessage('Please select a file.', true); return null; }
            if (!currentUser) { showMessage('You are not logged in.', true); return null; }
            showLoading(true);
            try {
                const response = await fetch(API_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'upload_file', uid: currentUser.uid, file: file, type: type })
                });
                const result = await response.json();
                showLoading(false);

                if (result.success) {
                    showMessage(`${type.replace('_', ' ')} uploaded successfully!`, false);
                    return result.url;
                } else {
                     showMessage(result.message || 'File upload failed.', true);
                     return null;
                }
            } catch (error) {
                showLoading(false);
                showMessage('Upload failed. Check server connection.', true);
                console.error('Upload Error:', error);
                return null;
            }
        }
        
        function setupImageUpload(inputId, previewId, nextScreenId, dataKey) {
            const input = document.getElementById(inputId);
            input?.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if(file){
                    const reader = new FileReader();
                    reader.onload = async (event) => {
                        document.getElementById(previewId).src = event.target.result;
                        document.getElementById(previewId).classList.remove('hidden');
                        const url = await handleFileUpload(event.target.result, dataKey);
                        if (url) { 
                            showScreen(nextScreenId); 
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
        setupImageUpload('nid-front-input', 'nid-front-preview', 'nid-back-screen', 'nid_front');
        setupImageUpload('nid-back-input', 'nid-back-preview', 'selfie-screen', 'nid_back');
        setupImageUpload('selfie-input', 'selfie-preview', 'signature-screen', 'selfie');
        
        // Step 3: Signature Pad
        const canvas = document.getElementById('signature-canvas');
        if (canvas) {
            const ctx = canvas.getContext('2d');
            let drawing = false;
            function getPos(e) {
                const rect = canvas.getBoundingClientRect();
                const event = e.touches ? e.touches[0] : e;
                return { x: event.clientX - rect.left, y: event.clientY - rect.top };
            }
            function startDrawing(e) { drawing = true; ctx.beginPath(); ctx.moveTo(getPos(e).x, getPos(e).y); }
            function stopDrawing() { drawing = false; }
            function draw(e) {
                if (!drawing) return; e.preventDefault();
                ctx.lineWidth = 3; ctx.lineCap = 'round'; ctx.strokeStyle = '#333';
                ctx.lineTo(getPos(e).x, getPos(e).y); ctx.stroke();
            }
            canvas.addEventListener('mousedown', startDrawing); canvas.addEventListener('mouseup', stopDrawing);
            canvas.addEventListener('mousemove', draw); canvas.addEventListener('touchstart', startDrawing);
            canvas.addEventListener('touchend', stopDrawing); canvas.addEventListener('touchmove', draw);

            document.getElementById('clear-signature-btn')?.addEventListener('click', () => {
                 ctx.clearRect(0, 0, canvas.width, canvas.height);
            });
            document.getElementById('submit-signature-btn')?.addEventListener('click', async () => {
                const dataUrl = canvas.toDataURL('image/png');
                if (canvas.toDataURL() === document.createElement('canvas').toDataURL()){
                    showMessage('Please provide a signature.', true); return;
                }
                const url = await handleFileUpload(dataUrl, 'signature');
                if (url) { showScreen('pin-screen'); }
            });
        }

        // Step 4: PIN Setup
        document.getElementById('pin-form')?.addEventListener('submit', async (e) => {
            e.preventDefault(); 
            showLoading(true);
            const pin = document.getElementById('pin-input').value;
            const confirmPin = document.getElementById('confirm-pin-input').value;
            if (pin.length !== 4) { showMessage('PIN must be 4 digits.', true); showLoading(false); return; }
            if (pin !== confirmPin) { showMessage('PINs do not match.', true); showLoading(false); return; }
            
            try {
                const response = await fetch(API_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'complete_kyc', uid: currentUser.uid, pin: pin })
                });
                const result = await response.json();
                showLoading(false);
                if(result.success){
                    showMessage('Registration complete! Please log in.', false);
                    document.getElementById('login-form').reset();
                    showScreen('login-screen'); 
                } else {
                    showMessage(result.message, true);
                }
            } catch(error) {
                showLoading(false);
                showMessage('Failed to save data. Check server connection.', true);
                console.error('PIN Setup Error:', error);
            }
        });

        // Step 5: App Logic
        function setupAppForUser(userData) {
            document.getElementById('user-name').textContent = userData.email;
            document.getElementById('balance-amount').textContent = `৳${parseFloat(userData.balance).toFixed(2)}`;
        }

        document.getElementById('logout-btn')?.addEventListener('click', () => {
             currentUser = null;
             // Here you might also call a logout.php endpoint to destroy server session
             showScreen('welcome-screen');
        });

        showScreen('welcome-screen');
    }

    window.onload = initApp;
    </script>
</body>
</html>
