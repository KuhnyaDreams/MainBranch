<?php
header('Content-Type: application/json');
require_once('connectToDB.php');
$sql = "INSERT INTO Users (login, password) VALUES ($_POST['login'], $_POST['passwords'])";
mysqli_query($link, $sql);
mysqli_close($link);
?>