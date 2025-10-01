<?php

$host = 'localhost';
$dbname = 'cffc';
$user = 'root';
$pass = 'recmaster';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

?>