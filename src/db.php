<?php
// Simple MySQL connection using mysqli
$host = 'localhost';
$user = 'u296155119_admin';
$pass = '4Dmin123o';
$db   = 'u296155119_OptiStock2';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Error de conexion: ' . $conn->connect_error);
}
?>
