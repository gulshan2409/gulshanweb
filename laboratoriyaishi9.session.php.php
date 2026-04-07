<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // tekshiramiz captcha kelganmi
    if (!isset($_POST['captcha']) || empty($_POST['captcha'])) {
        echo "❌ Captcha kiritilmadi!";
        exit();
    }

    $userCaptcha = $_POST['captcha'];
    $realCaptcha = $_SESSION['captcha'] ?? '';

    // captcha mavjudligini ham tekshiramiz
    if (empty($realCaptcha)) {
        echo "❌ Captcha eskirgan, qaytadan urinib ko‘ring!";
        exit();
    }

    // solishtirish
    if ($userCaptcha !== $realCaptcha) {
        echo "❌ Captcha noto‘g‘ri!";
        unset($_SESSION['captcha']); // eski captcha o‘chadi
        exit();
    }

    echo "✅ Captcha to‘g‘ri!";

    // yangilaymiz
    unset($_SESSION['captcha']);
}
?>