<?php
/* Database credentials */

$servername = 'localhost';
$username = 'root';
$password = 'root';

/* Attempt to connect to MySQL database */
$conn = new mysqli_connect($servername, $username, $password);

// Check connection
if($conn->connect_error){
    die("ERROR: Connection failed. " . $conn->connect_error);
}

?>
