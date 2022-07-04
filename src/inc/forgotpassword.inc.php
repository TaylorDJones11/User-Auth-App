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
      <h2>Forgot Your Password?</h2>
      <p>Please fill in your email</p>
      <form class="" action="login.php" method="post">

        <div class="form-group">
          <label for="name">Email: <sup>*</sup></label>
          <input type="email" name="email" class="form-control form-control-md
          <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>



        <div class="row">
          <div class="col">
            <input type="submit" name="" value="Recover Password" class="btn btn-success btn-block mt-2">
          </div>

        </div>
      </form>
    </div>
  </div>

</div>
</main>
</body>
</html>
