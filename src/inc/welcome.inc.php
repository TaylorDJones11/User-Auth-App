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


<main>

  <!-- Displaying the User/Librarian Name -->
  <!-- Only Librarians can add new books -->
  <div class="welcome-div">
    <h1>Welcome, <?php echo $_SESSION['user']['name']; ?></h1>
    <?php if($_SESSION['user_type'] == 'librarian'): ?>
      <a href="add-book.php">Add new book</a>
    <?php endif; ?>
  </div>


<!-- Librarian Welcome View -->


  <?php foreach($books as $book): ?>

<?php if($_SESSION['user_type'] == 'librarian'): ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title"><a href="book.php?id=<?php echo $book['book_id'] ?>"><?php echo $book['bookname'] ?></a></h2>
        </div>
        <div class="panel-body">
            <p>Book ID: <?php echo $book['book_id'] ?></p>
            <p>Year: <?php echo $book['year'] ?></p>
            <p>Genre:<?php echo $book['genre'] ?></p>
            <p>Author:<?php echo $book['author_name'] ?></p>
            <p>Age:<?php echo $book['age'] ?></p>
        </div>
        <div class="panel-footer">
          <div class="row">
              <div class="col">
              <a href="edit-book.php?id=<?php echo $book['book_id'] ?>" title="Edit Product" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i></a>
              <a href="delete-book.php?id=<?php echo $book['book_id'] ?>" onClick='return confirm("Are you sure?")' title="Delete Product"class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </div>
        </div>

        <?php endif; ?>

    </div>












<!-- Users Welcome Display -->

    <div class="grid-item-books">
      <?php if($_SESSION['user_type'] == 'user'): ?>
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
        <?php endif; ?>
    </div>

  <?php endforeach; ?>

</main>
