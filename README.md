# Digital Wallet Web Application (Money App)

<div align="center">
  <img src="https://img.icons8.com/ios-filled/100/e2136e/b.png" alt="Logo" />
</div>

<p align="center">
  <em> একটি সহজ এবং सुरक्षित ডিজিটাল ওয়ালেট ওয়েব অ্যাপ্লিকেশন, যা PHP এবং MySQL দ্বারা চালিত। </em>
  <br>
  <strong>(A simple and secure digital wallet web application powered by PHP and MySQL.)</strong>
</p>

---

## 📝 বর্ণনা (Description)
এই প্রকল্পটি একটি সম্পূর্ণ ডিজিটাল ওয়ালেট অ্যাপ্লিকেশন যা ব্যবহারকারীদের ইমেল এবং পাসওয়ার্ড দিয়ে নিবন্ধন ও লগইন করার সুবিধা দেয়। ব্যবহারকারীর পরিচয় যাচাই করার জন্য একটি বহু-ধাপ বিশিষ্ট KYC (Know Your Customer) প্রক্রিয়া রয়েছে, যার মধ্যে জাতীয় পরিচয়পত্র (NID), সেলফি এবং ডিজিটাল স্বাক্ষর আপলোড করার ব্যবস্থা অন্তর্ভুক্ত।

এই অ্যাপ্লিকেশনটি কোনো ফ্রেমওয়ার্ক ছাড়াই ভ্যানিলা পিএইচপি (Backend) এবং ভ্যানিলা জাভাস্ক্রিপ্ট (Frontend) ব্যবহার করে তৈরি করা হয়েছে, যা নতুনদের জন্য বোঝা এবং কাস্টমাইজ করা সহজ।

## ✨ প্রধান বৈশিষ্ট্য (Key Features)

-   **নিবন্ধন ও লগইন:** ইমেল এবং পাসওয়ার্ড ব্যবহার করে নিরাপদ প্রমাণীকরণ ব্যবস্থা।
-   **KYC ভেরিফিকেশন:**
    -   NID কার্ডের সামনের এবং পেছনের ছবি আপলোড।
    -   ব্যবহারকারীর লাইভ সেলফি আপলোড।
    -   ডিজিটাল স্বাক্ষর দেওয়ার জন্য একটি ক্যানভাস প্যাড।
-   **সুরক্ষিত পিন:** লেনদেনের নিরাপত্তার জন্য ৪-ডিজিটের পিন সেটআপ।
-   **ড্যাশবোর্ড:** লগইন করার পর ব্যবহারকারীর নাম এবং বর্তমান ব্যালেন্স দেখার সুবিধা।
-   **সরাসরি সার্ভার-ভিত্তিক:** Firebase বা অন্য কোনো BaaS ছাড়াই নিজস্ব হোস্টিং এবং ডাটাবেস ব্যবহার করে চলে।
-   **সহজ প্রযুক্তি:** ব্যাকএন্ডের জন্য PHP এবং MySQL, এবং ফ্রন্টএন্ডের জন্য Tailwind CSS সহ ভ্যানিলা JavaScript।

## 📸 স্ক্রিনশট (Screenshots)

<table align="center">
  <tr>
    <td align="center"><strong>১. স্বাগতম স্ক্রিন</strong><br><img src="https://placehold.co/400x700/f0f2f5/333?text=1.+Welcome+Screen" width="200"></td>
    <td align="center"><strong>২. লগইন/রেজিস্ট্রেশন</strong><br><img src="https://placehold.co/400x700/ffffff/e2136e?text=2.+Login+/+Register" width="200"></td>
    <td align="center"><strong>৩. KYC প্রক্রিয়া শুরু</strong><br><img src="https://placehold.co/400x700/f0f2f5/333?text=3.+KYC+Start" width="200"></td>
  </tr>
  <tr>
    <td align="center"><strong>৪. NID আপলোড</strong><br><img src="https://placehold.co/400x700/ffffff/e2136e?text=4.+NID+Upload" width="200"></td>
    <td align="center"><strong>৫. সেলফি আপলোড</strong><br><img src="https://placehold.co/400x700/f0f2f5/333?text=5.+Selfie+Upload" width="200"></td>
    <td align="center"><strong>৬. স্বাক্ষর প্রদান</strong><br><img src="https://placehold.co/400x700/ffffff/e2136e?text=6.+Signature+Pad" width="200"></td>
  </tr>
   <tr>
    <td align="center"><strong>৭. পিন সেটআপ</strong><br><img src="https://placehold.co/400x700/f0f2f5/333?text=7.+PIN+Setup" width="200"></td>
    <td align="center"><strong>৮. অ্যাপ ড্যাশবোর্ড</strong><br><img src="https://placehold.co/400x700/ffffff/e2136e?text=8.+App+Dashboard" width="200"></td>
    <td align="center"><strong>৯. সফল বার্তা</strong><br><img src="https://placehold.co/400x700/28a745/white?text=Success+Message" width="200"></td>
  </tr>
</table>

## 🛠️ ব্যবহৃত প্রযুক্তি (Technology Stack)

-   **ফ্রন্টএন্ড:** HTML, Tailwind CSS, Vanilla JavaScript
-   **ব্যাকএন্ড:** PHP
-   **ডাটাবেস:** MySQL

## ⚙️ ইনস্টলেশন এবং সেটআপ গাইড

এই প্রকল্পটি আপনার নিজের হোস্টিং সার্ভারে সেট আপ করার জন্য নিচের ধাপগুলো অনুসরণ করুন।

### পূর্বশর্ত (Prerequisites)
-   PHP এবং MySQL সমর্থন করে এমন একটি ওয়েব হোস্টিং (cPanel সহ হলে ভালো)।
-   আপনার হোস্টিংয়ের সাথে সংযুক্ত একটি ডোমেইন নাম।

### ধাপ ১: ডাটাবেস তৈরি করুন

1.  আপনার হোস্টিংয়ের cPanel-এ লগইন করুন এবং **MySQL® Database Wizard** ব্যবহার করে একটি নতুন ডাটাবেস তৈরি করুন।
2.  একজন ডাটাবেস ইউজার তৈরি করুন এবং তাকে ডাটাবেসের জন্য সমস্ত অনুমতি (`ALL PRIVILEGES`) দিন।
3.  ডাটাবেসের নাম, ইউজারনেম এবং পাসওয়ার্ড সংরক্ষণ করুন।
4.  **phpMyAdmin**-এ যান, আপনার তৈরি করা ডাটাবেসটি সিলেক্ট করুন এবং **SQL** ট্যাবে নিচের কোডটি রান করে `users` টেবিল তৈরি করুন:

```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT 0.00,
  `kycStatus` varchar(50) DEFAULT 'pending',
  `nid_front_url` text DEFAULT NULL,
  `nid_back_url` text DEFAULT NULL,
  `selfie_url` text DEFAULT NULL,
  `signature_url` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### ধাপ ২: ফাইল কনফিগার এবং আপলোড

1.  **`api.php` ফাইলটি কনফিগার করুন:**
    -   `api.php` ফাইলটি খুলুন।
    -   নিচের অংশে আপনার ডাটাবেসের সঠিক তথ্য দিন:
    ```php
    // --- DATABASE CONNECTION ---
    $servername = "localhost";
    $username = "আপনার_ডাটাবেস_ইউজারনেম"; // আপনার ইউজারনেম দিন
    $password = "আপনার_ডাটাবেস_পাসওয়ার্ড"; // আপনার পাসওয়ার্ড দিন
    $dbname = "আপনার_ডাটাবেসের_নাম";   // আপনার ডাটাবেসের নাম দিন
    ```

2.  **ফাইলগুলো আপলোড করুন:**
    -   আপনার হোস্টিংয়ের ফাইল ম্যানেজারের `public_html` ফোল্ডারে যান।
    -   কনফিগার করা `api.php` এবং `index.php` ফাইল দুটি আপলোড করুন।

3.  **`uploads` ফোল্ডার তৈরি করুন:**
    -   `public_html` ফোল্ডারের ভেতরে `uploads` নামে একটি নতুন ফোল্ডার তৈরি করুন।
    -   এই ফোল্ডারটির পারমিশন `755` বা `777` সেট করুন যাতে সার্ভার এখানে ফাইল লিখতে পারে।

### ধাপ ৩: অ্যাপ্লিকেশন অ্যাক্সেস করুন
আপনার ব্রাউজারে আপনার ডোমেইন ঠিকানা (e.g., `https://yourdomain.com`) ভিজিট করুন। সবকিছু ঠিক থাকলে, আপনি অ্যাপ্লিকেশনটির স্বাগতম স্ক্রিন দেখতে পাবেন।

## 📁 ফাইল স্ট্রাকচার

```
/public_html
|
|-- index.php       # মূল অ্যাপ্লিকেশন ফাইল (Frontend: HTML, CSS, JS)
|-- api.php         # সমস্ত ব্যাকএন্ডের লজিক (Backend: PHP)
|-- uploads/        # ব্যবহারকারীর KYC ডকুমেন্ট এখানে সেভ হবে (অবশ্যই write permission থাকতে হবে)
`-- README.md       # এই ফাইলটি
```

## 🤝 অবদান (Contributing)
এই প্রকল্পে অবদান রাখতে চাইলে পুল রিকোয়েস্ট (Pull Request) পাঠাতে পারেন অথবা কোনো সমস্যা থাকলে একটি ইস্যু (Issue) তৈরি করতে পারেন। সকল অবদানকে স্বাগত জানানো হয়।

## 📜 লাইসেন্স (License)
এই প্রকল্পটি MIT লাইসেন্সের অধীনে লাইসেন্সপ্রাপ্ত।

---
Made with ❤️ for learning and demonstration purposes.
