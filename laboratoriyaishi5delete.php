<?php

include 'db.php';

$id = $_GET['id'];

$conn->query("DELETE FROM academic_records WHERE record_id=$id");

header("Location: index.php");

?>