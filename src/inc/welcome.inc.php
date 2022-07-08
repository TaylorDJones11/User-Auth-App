<?php
session_start();
require('src/inc/config.inc.php');
require "src/classes/Book.class.php";

$bookObject = new Book($mysqli);

$books = $bookObject->getBooks();

// Checking to see if the session is valid
if(!isset($_SESSION['valid'])){
  header("Location: login.php");
  exit();
}

?>

<!-- Displaying the User/Librarian Name -->
<!-- Only Librarians can add new books -->
<div style="margin: 100px;">
  <h1>Welcome <?php echo $_SESSION['user']['name']; ?></h1>
  <?php if($_SESSION['user_type'] == 'librarian'): ?>
    <a href="add-book.php">Add new book</a>
  <?php endif; ?>
</div>
<hr>
<main>

<!-- Members/ Librarian View -->
<table style="width: 100%">
  <tr>
    <?php if($_SESSION['user_type'] == 'librarian'): ?>
      <td><b>Book ID</b></td>
    <?php endif; ?>

    <td><b>Book Name</b></td>
    <td><b>Year</b></td>
    <td><b>Genre</b></td>
    <td><b>Author name</b></td>
    <?php if($_SESSION['user_type'] == 'librarian'): ?>
      <td><b>Author Age</b></td>
    <?php endif; ?>
    <?php if($_SESSION['user_type'] == 'librarian'): ?>
      <td><b>Action</b></td>
    <?php endif; ?>
  </tr>
  <?php foreach($books as $book): ?>
    <tr>
      <?php if($_SESSION['user_type'] == 'librarian'): ?>
        <td><?php echo $book['book_id'] ?></td>
        <?php endif; ?>

      <td><a href="book.php?id=<?php echo $book['book_id'] ?>"><?php echo $book['bookname'] ?></a></td>
      <td><?php echo $book['year'] ?></td>
      <td><?php echo $book['genre'] ?></td>
      <td><?php echo $book['author_name'] ?></td>
      <?php if($_SESSION['user_type'] == 'librarian'): ?>
        <td><?php echo $book['age'] ?></td>
      <?php endif; ?>
      <?php if($_SESSION['user_type'] == 'librarian'): ?>
        <td><a href="edit-book.php?id=<?php echo $book['book_id'] ?>">Edit</a></td>
        <td><a href="delete-book.php?id=<?php echo $book['book_id'] ?>" onClick='return confirm("Are you sure?")'>Delete</a></td>
      <?php endif; ?>
    </tr>

  <?php endforeach; ?>
</table>
</main>
