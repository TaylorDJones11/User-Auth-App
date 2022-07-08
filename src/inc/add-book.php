<?php
session_start();
require('src/inc/config.inc.php');
require "src/classes/book.class.php";
require "src/classes/author.class.php";

$bookObject = new Book($mysqli);
$authorObject = new Author($mysqli);


$authors = $authorObject->getAuthors();

// is valid?
if(!isset($_SESSION['valid'])){
  header("Location: login.php");
  exit();
}

if($_POST){
    $response = $bookObject->addBook($_POST);
    if($response){
        header("Location: welcome.php");
        exit();
    }
}

?>
<div style="margin: 100px;">
  <h1>Add new book</h1>
</div>
<hr>

<hr>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <table style="width: 100%">
        <tr>
            <td>Book Name</td>
            <td><input type="text" name="bookname" required /></td>
        </tr>
        <tr>
            <td>Year</td>
            <td><input type="text" name="year" required /></td>
        </tr>
        <tr>
            <td>Genre</td>
            <td><input type="text" name="genre" required /></td>
        </tr>
        <tr>
            <td>Age group</td>
            <td><input type="text" name="age_group" required /></td>
        </tr>
        <tr>
            <td>Author</td>
            <td>
                <select name="author_id">
                    <?php foreach($authors as $author): ?>
                        <option value="<?php echo $author['author_id'] ?>"><?php echo $author['author_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" /></td>
        </tr>
    </table>
</form>
