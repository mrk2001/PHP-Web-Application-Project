<?php
// db_connect.php
$host = 'localhost';
$dbname = 'cold_drink_cafe';
$username = 'root';
$password = ''; 

// create connection
$conn = new mysqli($host, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
