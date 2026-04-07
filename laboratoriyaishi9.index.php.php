<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST" action="session.php">
    <input type="text" name="username" placeholder="Username"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>

    <img src="captcha.php" id="captchaImg" onclick="refreshCaptcha()" style="cursor:pointer;"><br>
    <small>Captcha ustiga bosing yangilash uchun</small><br><br>

    <input type="text" name="captcha" placeholder="Captcha kiriting"><br><br>

    <button type="submit">Login</button>
</form>

<script>
function refreshCaptcha() {
    document.getElementById("captchaImg").src = "captcha.php?" + Date.now();
}
</script>

</body>
</html>