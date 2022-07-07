<?php
session_start();
require('src/inc/config.inc.php');
require "src/classes/users.class.php";

$data = null;

if(isset($_POST["login"])){

  $data = $_POST;
  $object = new Users($mysqli);
  $errors = $object->login();

  if(isset($_SESSION['valid'])){
    header('Location: welcome.php');
    exit();
  }

}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libby Library</title>
    <link rel="stylesheet" href="src/css/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </head>
  <body>

<main>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <div class="row">
        <div class="col member">
          <h2 class="login-text"> Member Login</h2>
        </div>
      </div>



      <?php if(isset($errors['success'])): ?>
        <?php echo $errors['success'] ?>
      <?php endif; ?>
      
      <p>Please fill in your credientails</p>
      <form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

      <div class="form-group">
          <label for="name">Email: <sup>*</sup></label>
          <input type="text" name="email" class="form-control form-control-md
          <?php echo (isset($errors['email_err']) && !empty($errors['email_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo (isset($data['email'])) ? $data['email'] : ''; ?>">
          <span class="invalid-feedback"><?php echo (isset($errors['email_err'])) ? $errors['email_err'] : ''; ?></span>
        </div>
        <div class="form-group">
          <label for="name">Password: <sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-md
          <?php echo (isset($errors['password_err']) && !empty($errors['password_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo (isset($data['password'])) ? $data['password'] : ''; ?>">
          <span class="invalid-feedback"><?php echo (isset($errors['password_err'])) ? $errors['password_err'] : ''; ?></span>
        </div>

        <div class="row">
          <div class="col">
            <a href="forgotpassword.php" class="forgotpassword"> Forgot Password? </a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <input type="submit" name="login" value="Login" class="btn btn-success btn-block shadow w-50 p-2 rounded mt-2">
          </div>
          <div class="col">
            <a href="register.php" class="btn btn-light btn-block">No account? Sign up today</a>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
</main>
</body>
</html>
