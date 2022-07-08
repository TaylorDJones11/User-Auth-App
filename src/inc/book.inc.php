<?php
session_start();
require('src/inc/config.inc.php');
require "src/classes/book.class.php";

$bookObject = new Book($mysqli);

$book = $bookObject->getBook($_GET['id']);


// is valid?
if(!isset($_SESSION['valid'])){
  header("Location: login.php");
  exit();
}

?>
<div style="margin: 100px;">
  <h1>Book : <?php echo $book['bookname'] ?></h1>
</div>
<hr>
<table style="width: 100%">
    <tr>
        <td>Name</td>
        <td><?php echo $book['bookname'] ?></td>
    </tr>
    <tr>
        <td>Year</td>
        <td><?php echo $book['year'] ?></td>
    </tr>
    <tr>
        <td>Genre</td>
        <td><?php echo $book['genre'] ?></td>
    </tr>
    <tr>
        <td>Age group</td>
        <td><?php echo $book['age_group'] ?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?php echo $book['bookname'] ?></td>
    </tr>
    <tr>
        <td>Author Name</td>
        <td><?php echo $book['author_name'] ?></td>
    </tr>
    <tr>
        <td>Author age</td>
        <td><?php echo $book['age'] ?></td>
    </tr>
</table>
