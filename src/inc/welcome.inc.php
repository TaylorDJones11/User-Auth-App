<?php
session_start();
require('src/inc/config.inc.php');
require "src/classes/Book.class.php";

$bookObject = new Book($mysqli);

$books = $bookObject->getBooks();

// is valid?
if(!isset($_SESSION['valid'])){
  header("Location: login.php");
  exit();
}

?>
<div style="margin: 100px;">
  <h1>Welcome <?php echo $_SESSION['user']['name']; ?></h1>
  <?php if($_SESSION['user_type'] == 'librarian'): ?>
    <a href="add-book.php">Add new book</a>
  <?php endif; ?>
</div>
<hr>
<table style="width: 100%">
  <tr>
    <td><b>Book ID</b></td>
    <td><b>Book Name</b></td>
    <td><b>Year</b></td>
    <td><b>Genre</b></td>
    <td><b>Author name</b></td>
    <td><b>Author age</b></td>
    <?php if($_SESSION['user_type'] == 'librarian'): ?>
      <td><b>Action</b></td>
    <?php endif; ?>
  </tr>
  <?php foreach($books as $book): ?>
    <tr>
      <td><?php echo $book['book_id'] ?></td>
      <td><a href="book.php?id=<?php echo $book['book_id'] ?>"><?php echo $book['bookname'] ?></a></td>
      <td><?php echo $book['year'] ?></td>
      <td><?php echo $book['genre'] ?></td>
      <td><?php echo $book['author_name'] ?></td>
      <td><?php echo $book['age'] ?></td>
      <?php if($_SESSION['user_type'] == 'librarian'): ?>
        <td><a href="edit-book.php?id=<?php echo $book['book_id'] ?>">Edit</a></td>
        <td><a href="delete-book.php?id=<?php echo $book['book_id'] ?>" onClick='return confirm("Are you sure?")'>Delete</a></td>
      <?php endif; ?>
    </tr>

  <?php endforeach; ?>
</table>
