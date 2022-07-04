
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Login</h2>
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
            <a href="src/pages/forgotpassword.php" class="forgotpassword"> Forgot Password? </a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <input type="submit" name="" value="Login" class="btn btn-success btn-block">
          </div>
          <div class="col">
            <a href="src/pages/register.php" class="btn btn-light btn-block">No account? Sign up today</a>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
