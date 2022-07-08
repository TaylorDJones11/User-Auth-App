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
<div class="welcome-div">
  <h1>Welcome, <?php echo $_SESSION['user']['name']; ?></h1>
  <?php if($_SESSION['user_type'] == 'librarian'): ?>
    <a href="add-book.php">Add new book</a>
  <?php endif; ?>
</div>
<hr>
<main>

<!-- Librarian Welcome View -->
<table>
  <tr>
    <?php if($_SESSION['user_type'] == 'librarian'): ?>
      <td><b>Book ID</b></td>
      <td><b>Book Name</b></td>
      <td><b>Year</b></td>
      <td><b>Genre</b></td>
      <td><b>Author name</b></td>
      <td><b>Author Age</b></td>
      <td><b>Action</b></td>
    <?php endif; ?>
  </tr>
  <?php foreach($books as $book): ?>
    <tr>
      <?php if($_SESSION['user_type'] == 'librarian'): ?>
        <td><?php echo $book['book_id'] ?></td>
        <td><?php echo $book['year'] ?></td>
        <td><?php echo $book['genre'] ?></td>
        <td><?php echo $book['author_name'] ?></td>
        <td><?php echo $book['age'] ?></td>
        <td><a href="edit-book.php?id=<?php echo $book['book_id'] ?>">Edit</a></td>
        <td><a href="delete-book.php?id=<?php echo $book['book_id'] ?>" onClick='return confirm("Are you sure?")'>Delete</a></td>
        <?php endif; ?>
    </tr>


<!-- Users Welcome Display -->
    <div class="grid-item-books">
        <section class="card-display">
          <div class="card">
              <img src="img/display.png">
              <div class="container">
                <div class="content">
                  <h4><b><a href="book.php?id=<?php echo $book['book_id'] ?>"><?php echo $book['bookname'] ?></a></b></h4>
                  <p><?php echo $book['author_name'] ?></p>
                  <p><?php echo $book['year'] ?></p>

                </div>

              </div>
            </div>
        </section>
    </div>

  <?php endforeach; ?>
</table>
</main>
