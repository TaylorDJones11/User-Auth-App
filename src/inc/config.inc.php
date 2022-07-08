<?php
/* Database credentials */

$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'library';

/* Attempt to connect to MySQL database */
$mysqli = new mysqli($servername,$username,$password,$database);

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
?>
