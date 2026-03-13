<?php

if(
isset($_POST['feedback_ism']) &&
isset($_POST['feedback_email']) &&
isset($_POST['feedback_baho']) &&
isset($_POST['feedback_mavzu']) &&
isset($_POST['feedback_matn'])
){

$ism = htmlspecialchars($_POST['feedback_ism']);
$email = htmlspecialchars($_POST['feedback_email']);
$baho = intval($_POST['feedback_baho']);
$mavzu = htmlspecialchars($_POST['feedback_mavzu']);
$matn = htmlspecialchars($_POST['feedback_matn']);

if($ism == "" || $email == "" || $mavzu == "" || $matn == ""){
echo "Iltimos barcha maydonlarni to‘ldiring!";
exit;
}

if($baho < 1 || $baho > 5){
echo "Baho 1 dan 5 gacha bo‘lishi kerak!";
exit;
}

if(strlen($matn) < 20){
echo "Fikr kamida 20 ta belgidan iborat bo‘lishi kerak!";
exit;
}

echo "<h3>Fikr qabul qilindi!</h3>";
echo "Ism: <b>$ism</b><br>";
echo "Email: <b>$email</b><br>";
echo "Baho: <b>$baho</b><br>";
echo "Mavzu: <b>$mavzu</b><br>";
echo "Fikr: <b>$matn</b>";

}else{

echo "Ma'lumot kelmadi!";

}

?>