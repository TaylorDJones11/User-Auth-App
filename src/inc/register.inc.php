<?php

if(isset($_POST["register"])){
  //Grabbing Data

  //Instantiate SignupContr class

  //Running error handlers & user signup

  // Going back to login
}
require "src/classes/users.class.php";
session_start();
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
      <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
          <label for="name">Name: <sup>*</sup></label>
          <input type="text" name="name" class="form-control form-control-md
          <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['name']; ?>">
          <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="name">Email: <sup>*</sup></label>
          <input type="email" name="email" class="form-control form-control-md
          <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="name">Password: <sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-md
          <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="name">Confirm password: <sup>*</sup></label>
          <input type="password" name="password_err" class="form-control form-control-md
          <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['confirm_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>

        <div class="row">
          <div class="col">
            <input type="submit" name="register" value="Register" class="btn btn-success btn-block mt-2">
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
