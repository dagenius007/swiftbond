<?php
@include('connectdb.ext');
session_start(); ?>
<?php
//session_start();
require('connectdb.ext');
if (isset($_POST['email']) && isset($_POST['pwd'])) {
  $email = trim($_POST['email']);
  $pwd = trim($_POST['pwd']);
  try {
    $sql = "SELECT * FROM `users` where `email` = '" . $email . "' AND `password` = '" . $pwd . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      $conn->close();

      $_SESSION['email'] = $email;
      header("Location:dashboard/index.php");
    } else {

      $message = "Incorrect password";
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
} else {
  //header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bloom</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body class="auth">
  <nav class="navbar navbar-expand-md nav__bar">
    <div class="container">

      <a class="navbar-brand nav__brand" href="index.php">
        <img src="img/bloom.png" alt="bloom logo" />
      </a>
    </div>
  </nav>
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-sm-10 col-12 col-lg-7">
          <div class="card auth__card with-logo">
            <h3 class="card__title">
              Sign into Bloom
            </h3>
            <form action="login.php" method="post" class="">
              <div class="form__group">
                <input class="form-control form__field" placeholder="Email address" type="email" name="email">
              </div>
              <div class="form__group">
                <input class="form-control form__field" placeholder="Password" type="password" name="pwd">
              </div>
              <p class="text-danger">
                <?php isset($message) ? $message : "" ?>
              </p>
              <div class="form__group d-flex justify-content-center my-5">
                <button type="submit" class="btn btn__primary btn--lg btn--rounded">
                  Sign in
                </button>
              </div>
            </form>
            <p class="card__link"><a href="register.php"> Create an account </a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <footer class="footer">
    <div class="container">
      <div class="copyright">
        <p>&copy; Bloom 2019. All Rights Reserved.</p>
      </div>

      <div class="social">

      </div>
    </div>
  </footer>
  <script src="dist/app.js"></script>
</body>

</html>