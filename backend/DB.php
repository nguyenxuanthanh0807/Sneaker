<?php

if (!isset($_SESSION)) {
    session_start();
}

$servername = "localhost";
$username = "root";
$password = "";
$db = "t_user";
global $conn;

$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die('Could not connect: ' . ($conn));
}
// echo "Connected successfully";
mysqli_select_db($conn, $db);



