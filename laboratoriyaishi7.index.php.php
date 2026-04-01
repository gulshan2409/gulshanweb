<?php
// Cookie qiymatlarini olish
$dark = isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == 'dark' ? 'dark' : '';
$gray = isset($_COOKIE['grayscale']) && $_COOKIE['grayscale'] == 'grayscale' ? 'grayscale' : '';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dark + Grayscale</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="<?php echo $dark . ' ' . $gray; ?>">

<h1>Sayt Rejimlari</h1>

<button onclick="toggleDark()">Dark Mode</button>
<button onclick="toggleGray()">Grayscale</button>

<p>Bu oddiy matn. Rejimlarni sinab ko‘ring.</p>

<script src="script.js"></script>
</body>
</html>