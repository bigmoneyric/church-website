<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
$conn = new mysqli("localhost", "root", "recmaster", "CFFC");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

  //Query to check the credentials
  $query = "SELECT * FROM users WHERE username = '$username' AND password ='$password'";
  $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        //Login successful
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin.php");
        exit();
    } else {
        //Login failed
        echo "<script>alert('Invalid username or password');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
}
?>