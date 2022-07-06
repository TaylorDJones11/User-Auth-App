<?php


if(isset($_POST["login"])){
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

        <div class="col librarian">
          <h2 class="login-text">Librarian Login</h2>
        </div>
      </div>




      <!-- <h2>Login</h2> -->
      <p>Please fill in your credientails</p>
      <form class="" action="login.php" method="post">

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
