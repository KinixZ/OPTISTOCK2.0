<?php
// Simple MySQL connection using mysqli
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'optistock_db';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Error de conexion: ' . $conn->connect_error);
}
?>
