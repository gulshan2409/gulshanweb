<?php

$target_dir = "uploads-aliyev/"; // o‘zingizni FIO yozing

// Agar papka mavjud bo‘lmasa yaratiladi
if(!is_dir($target_dir)){
    mkdir($target_dir);
}

$file_name = $_FILES["image"]["name"];
$tmp_name = $_FILES["image"]["tmp_name"];
$file_size = $_FILES["image"]["size"];

// Fayl turi
$allowed = ['jpg', 'jpeg', 'png'];
$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

// 1️⃣ Format tekshirish
if(!in_array($ext, $allowed)){
    die("Faqat JPG, JPEG, PNG rasm yuklash mumkin!");
}

// 2️⃣ Hajm tekshirish (2MB)
if($file_size > 2 * 1024 * 1024){
    die("Rasm hajmi 2MB dan katta!");
}

// 3️⃣ Yangi nom berish
$new_name = time() . "_" . $file_name;

// 4️⃣ Yuklash
if(move_uploaded_file($tmp_name, $target_dir . $new_name)){
    echo "Rasm muvaffaqiyatli yuklandi!<br>";
    echo "<img src='$target_dir$new_name' width='200'>";
} else {
    echo "Xatolik yuz berdi!";
}

?>