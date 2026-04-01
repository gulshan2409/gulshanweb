<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "kino_db";

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Ulanish xatosi: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $db");
$conn->select_db($db);

// Jadvallar
$conn->query("
CREATE TABLE IF NOT EXISTS rejissyorlar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ism VARCHAR(100),
    mamlakat VARCHAR(100)
)");

$conn->query("
CREATE TABLE IF NOT EXISTS filmlar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sarlavha VARCHAR(100),
    yil INT,
    reyting FLOAT,
    rejissyor_id INT,
    FOREIGN KEY (rejissyor_id) REFERENCES rejissyorlar(id)
)");

// Boshlang‘ich data (takror qo‘shilmasligi uchun oddiy tekshiruv)
$check = $conn->query("SELECT COUNT(*) as soni FROM rejissyorlar")->fetch_assoc();
if ($check['soni'] == 0) {
    $conn->query("INSERT INTO rejissyorlar (ism, mamlakat) VALUES
    ('Christopher Nolan', 'USA'),
    ('Quentin Tarantino', 'USA'),
    ('James Cameron', 'Canada')
    ");

    $conn->query("INSERT INTO filmlar (sarlavha, yil, reyting, rejissyor_id) VALUES
    ('Inception', 2010, 8.8, 1),
    ('Django Unchained', 2012, 8.4, 2),
    ('Avatar', 2009, 7.9, 3)
    ");
}

// ================= DELETE BUTTON =================
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM filmlar WHERE id=$id");
    header("Location: index.php");
}

// ================= ADD FORM =================
if (isset($_POST['add'])) {
    $nom = $_POST['nom'];
    $yil = $_POST['yil'];
    $reyting = $_POST['reyting'];
    $rej_id = $_POST['rejissyor'];

    $conn->query("INSERT INTO filmlar (sarlavha, yil, reyting, rejissyor_id)
                  VALUES ('$nom', $yil, $reyting, $rej_id)");
    header("Location: index.php");
}

// ================= FILTER =================
$filter = "";
if (isset($_GET['year']) && $_GET['year'] != "") {
    $y = $_GET['year'];
    $filter = "WHERE yil = $y";
}

// ================= SELECT =================
$result = $conn->query("
SELECT filmlar.*, rejissyorlar.ism AS rej
FROM filmlar
JOIN rejissyorlar ON filmlar.rejissyor_id = rejissyorlar.id
$filter
");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kino tizimi</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; width: 100%; }
        th { background: #333; color: white; padding: 10px; }
        td { padding: 8px; border: 1px solid #ccc; text-align: center; }
        a { color: red; text-decoration: none; }
        form { margin: 20px 0; }
    </style>
</head>
<body>

<h2>🎬 Filmlar ro‘yxati</h2>

<!-- FILTER -->
<form method="GET">
    <input type="number" name="year" placeholder="Yil bo‘yicha filter">
    <button type="submit">Filter</button>
</form>

<table>
<tr>
    <th>ID</th>
    <th>Nomi</th>
    <th>Yil</th>
    <th>Reyting</th>
    <th>Rejissyor</th>
    <th>Amal</th>
</tr>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['sarlavha']}</td>
        <td>{$row['yil']}</td>
        <td>{$row['reyting']}</td>
        <td>{$row['rej']}</td>
        <td>
            <a href='?delete={$row['id']}' onclick=\"return confirm('O‘chirishni tasdiqlaysizmi?')\">❌ O‘chirish</a>
        </td>
    </tr>";
}
?>

</table>

<h3>➕ Yangi film qo‘shish</h3>

<form method="POST">
    <input type="text" name="nom" placeholder="Film nomi" required>
    <input type="number" name="yil" placeholder="Yil" required>
    <input type="text" name="reyting" placeholder="Reyting" required>

    <select name="rejissyor">
        <?php
        $rej = $conn->query("SELECT * FROM rejissyorlar");
        while ($r = $rej->fetch_assoc()) {
            echo "<option value='{$r['id']}'>{$r['ism']}</option>";
        }
        ?>
    </select>

    <button name="add">Qo‘shish</button>
</form>

</body>
</html>