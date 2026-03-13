 <!DOCTYPE html>
<html>
<head>
    <title>Ro'yxatdan o'tish</title>
</head>
<body>

<h2>Ro'yxatdan o'tish formasi</h2>

<form method="POST" action="">
    <label>Ism:</label><br>
    <input type="text" name="ism"><br><br>

    <label>Familiya:</label><br>
    <input type="text" name="familiya"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Login:</label><br>
    <input type="text" name="login"><br><br>

    <label>Parol:</label><br>
    <input type="password" name="parol"><br><br>

    <input type="submit" name="submit" value="Yuborish">
</form>

<?php
if(isset($_POST['submit'])){

    $ism = $_POST['ism'];
    $familiya = $_POST['familiya'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $parol = $_POST['parol'];

    echo "<h3>Kiritilgan ma'lumotlar:</h3>";
    echo "Ism: $ism <br>";
    echo "Familiya: $familiya <br>";
    echo "Email: $email <br>";
    echo "Login: $login <br>";
    echo "Parol: $parol <br>";
}
?>

</body>
</html>