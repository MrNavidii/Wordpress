<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$datadb = 'wordpress';
session_start();
$connection = new mysqli($host, $user, $pass, $datadb);
if ($connection->connect_error) {
    die("Connection Failed : " . $connection->connect_error);
}
if (isset($_SESSION['username'])) {
    $username = htmlspecialchars($_SESSION['username']);
    echo "<h1>" . $username . "</h1>";
} else {
    echo "<h1>Error: User not found in session</h1>";
}

$connection->close();
?>
