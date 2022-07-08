<?php
session_start();
require('src/inc/config.inc.php');
require "src/classes/Book.class.php";

$bookObject = new Book($mysqli);



if(!isset($_SESSION['valid'])){
  header("Location: login.php");
  exit();
}

// Once book is deleted send back to Welcome Page
if($_GET['id']){
    $bookObject->deleteBook($_GET['id']);
    header("Location: welcome.php");
    exit();
}


?>
