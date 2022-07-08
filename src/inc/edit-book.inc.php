<?php
session_start();
require('src/inc/config.inc.php');
require "src/classes/book.class.php";
require "src/classes/author.class.php";

$bookObject = new Book($mysqli);
$authorObject = new Author($mysqli);

if($_POST){
    $response = $bookObject->updateBook($_POST);
    if($response){
        header("Location: welcome.php");
        exit();
    }
}

$authors = $authorObject->getAuthors();
$book = $bookObject->getBook($_GET['id']);


if(!isset($_SESSION['valid'])){
  header("Location: login.php");
  exit();
}


?>
<main>


<div>
  <h1>Edit Book : <?php echo $book['bookname'] ?></h1>
</div>

<form class="edit-book" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <table>
        <tr>
            <td>Book Name:</td>
            <td><input type="text" name="bookname" value="<?php echo $book['bookname'] ?>" required /></td>
        </tr>
        <tr>
            <td>Year:</td>
            <td><input type="text" name="year" value="<?php echo $book['year'] ?>" required /></td>
        </tr>
        <tr>
            <td>Genre:</td>
            <td><input type="text" name="genre" value="<?php echo $book['genre'] ?>" required /></td>
        </tr>
        <tr>
            <td>Age group:</td>
            <td><input type="text" name="age_group"  value="<?php echo $book['age_group'] ?>" required /></td>
        </tr>
        <tr>
            <td>Author:</td>
            <td>
                <select name="author_id">
                    <?php foreach($authors as $author): ?>
                        <option value="<?php echo $author['author_id'] ?>" <?php echo ($book['author_id'] == $author['author_id']) ? " selected" : "" ?>><?php echo $author['author_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <input type="hidden" value="<?php echo $_GET['id'] ?>" name="book_id" />
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" /></td>
        </tr>
    </table>
</form>
</main>
