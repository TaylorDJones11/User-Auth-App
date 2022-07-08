<?php
session_start();
session_unset();
session_destroy();

//Go page to Index/Main page

header("Location: index.php");
 ?>
