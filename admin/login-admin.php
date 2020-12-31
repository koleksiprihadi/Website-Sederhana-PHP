<?php
  session_start();
  $_SESSION['session'] = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <?php require_once("../header.php") ?>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Log in Admin</h5>
            <form class="form-signin" method="post">
              <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
                </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="login" type="submit">Masuk</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php require_once("auth.php")?>