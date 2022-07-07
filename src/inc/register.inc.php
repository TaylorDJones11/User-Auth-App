<?php
session_start();
require('src/inc/config.inc.php');
require "src/classes/users.class.php";

$data = null;

if(isset($_POST["register"])){

  $data = $_POST;
  $object = new Users($mysqli);
  $errors = $object->register();

  if(isset($_SESSION['valid'])){
    header('Location: welcome.php');
    exit();
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
  </head>
  <body>


<main class="">
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Create An Account</h2>
      <p>Please fill out to register with us</p>
      <?php if(isset($errors['success'])): ?>
        <?php echo $errors['success'] ?>
      <?php endif; ?>
      <p></p>
      <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
          <label for="name">Name: <sup>*</sup></label>
          <input type="text" name="name" class="form-control form-control-md
          <?php echo (isset($errors['name_err']) && !empty($errors['name_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo (isset($data['name'])) ? $data['name'] : ''; ?>">
          <span class="invalid-feedback"><?php echo (isset($errors['name_err'])) ? $errors['name_err'] : ''; ?></span>
        </div>
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
        <div class="form-group">
          <label for="name">Confirm Password: <sup>*</sup></label>
          <input type="password" name="confirm_password" class="form-control form-control-md
          <?php echo (isset($errors['confirm_password_err']) && !empty($errors['confirm_password_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo (isset($data['confirm_password'])) ? $data['password'] : ''; ?>">
          <span class="invalid-feedback"><?php echo (isset($errors['confirm_password_err'])) ? $errors['confirm_password_err'] : ''; ?></span>
        </div>

        <div class="row">
          <div class="col">
            <input type="submit" name="register" value="Register" class="btn btn-success btn-block shadow w-50 p-2 rounded mt-2">
          </div>
          <div class="col">
            <a href="index.php" class="btn btn-light btn-block">Have an account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
</main>
</body>
</html>
