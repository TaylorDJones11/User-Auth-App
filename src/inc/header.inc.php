<nav class="navbar navbar-expand-sm fixed-top bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="src/img/books.png" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
      Libby Library
    </a>
    <?php if(isset($_SESSION['valid'])): ?>
        <a class="navbar-link" href="welcome.php" style="color: #000">Books</a>
        <a class="navbar-link" href="logout.php" style="color: #000">Logout</a>
    <?php endif; ?>
  </div>
</nav>

<!-- <div class="mobile-container">

<!-Top Navigation Menu -->
<!-- <div class="topnav">
  <a href="#home" class="active">Logo</a>
  <div id="myLinks">
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div> -->
