<?php session_start(); ?>

<h2>Register</h2>

<form method="POST" action="session.php">
    <input type="text" name="name" placeholder="Ism"><br><br>
    <input type="text" name="username" placeholder="Username"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>

    <img src="captcha.php" id="captchaImg2" onclick="refreshCaptcha2()" style="cursor:pointer;"><br><br>

    <input type="text" name="captcha" placeholder="Captcha"><br><br>

    <button type="submit">Register</button>
</form>

<script>
function refreshCaptcha2() {
    document.getElementById("captchaImg2").src = "captcha.php?" + Date.now();
}
</script>