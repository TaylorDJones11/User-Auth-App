<nav class="navbar navbar-expand-sm fixed-top bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="src/img/books.png" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
      Libby Library
      <?php if(isset($_SESSION['valid'])): ?>
          <a href="welcome.php" style="color: #fff">Books</a>
          <a href="logout.php" style="color: #fff">Logout</a>
      <?php endif; ?>
    </a>
  </div>
</nav>
