<?php
$servername = 'localhost';
$dbname = 'kemahasiswaan';
$username = 'root';
$password = 'Adm1nroot';

// $mysqli = mysqli_connect($servername, $username, $password, $dbname); 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
?>
