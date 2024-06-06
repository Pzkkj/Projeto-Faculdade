<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $row['role'];
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>
