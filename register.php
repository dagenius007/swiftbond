<?php
session_start();
require('connectdb.ext');
if (isset($_POST['email']) && isset($_POST['password1'])) {

  $email = trim($_POST['email']);
  $pwd = trim($_POST['password1']);
  try {

    $sql = "SELECT * FROM `users` where `email` = '" . $_POST['email'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      echo "<script>alert('Details already exist')</script>";
      $conn->close();
      exit;
    } else {


      if ($_POST['password1'] != $_POST['password2']) {

        echo "<script>alert('Password Mismatch')</script>";
      } else {

        require('connectdb.ext');
        $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `package`, `plan`, `acno`, `bankname`, `accname`, `phone`, `acctype`)
						VALUES ('" . $_POST['fname'] . "', '" . $_POST['lname'] . "','" . $_POST['email'] . "','" . $_POST['password1'] . "',
						'" . $_POST['package'] . "', '" . $_POST['plan'] . "', '" . $_POST['accno'] . "','" . $_POST['bank'] . "','" . $_POST['accname'] . "','" . $_POST['phone'] . "','" . $_POST['acctype'] . "')";

        if ($conn->query($sql) === TRUE) {


          $_SESSION['email'] = $_POST['email'];
          $conn->close();
          //  echo "Go";
          header("Location:login.php");
        } else {
          echo 'yyyy';
          echo mysqli_error($conn);
        }
      }
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
} else {
  //echo "<script>alert('Input email or password')</script>";
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
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php">Swiftbond</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>

            </div>

            <div class="collapse navbar-collapse" id="navcol-1">

                <ul class="nav navbar-nav navbar-right">

                    <li role="presentation"><a href="index.php">Home</a></li>

                    <li role="presentation"><a href="about.php">About</a></li>
                    <li role="presentation"><a href="contact.php">Contact Us</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><span class="glyphicon glyphicon-user" > </span> Account<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="login.php"> <span class="glyphicon glyphicon-new-window"></span> Login</a></li>
                            <li class="active" role="presentation"><a href="register.php"> <span class="glyphicon glyphicon-edit"></span> Register</a></li>
                        </ul>
                    </li>

                </ul>

            </div>

        </div>

    </nav>



    <div class="container-fluid">

      <!-- <div class="row">

        <div class="bar col-md-12 ">

          <h4>REGISTER</h4>

        </div>

        <div class="container">

          <div class="col-md-12">



            <h3 style="text-align: center; text-transform: uppercase;">Register Your Account Now</h3>

            <h4 style="text-align: center; font-weight: bold;">

            Already Have An Account? <a class="ra" href="login.php"> Login Now </a>

            </h4>

            <hr>

                <form action="register.php" method="post" class="rform">

                  <div class="row">

                  <div class="col-md-6">

                  <label>First Name:</label>

                  <input name="fname" class="form-control input-lg" type="text" required>

                  </div>



                  <div class="col-md-6">

                  <label>Last Name:</label>

                  <input name="lname" class="form-control input-lg" type="text" required>

                  </div>



                  </div>

                  <br>





                  <div class="row">



                  <div class="col-md-6">

                  <label>Email Address:</label>

                  <input name="email" class="form-control input-lg" type="email" required>

                  <div id="emailerr"></div>

                  </div>



                  <div class="col-md-6">

                  <label>Phone Number:</label>

                  <input id="phone" name="phone" class="form-control input-lg" type="text" required>

                  <div id="phoneerr"></div>

                  </div>





                  </div>

                  <br><hr>





                  <div class="row">



                  <div class="col-md-4">

                  <label>Bank Name:</label>

                  <input name="bank" class="form-control input-lg" type="text" required>

                  </div>

                  <div class="col-md-4">

                  <label>Account Name:</label> -->

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
          <div class="card auth__card">
            <h3 class="card__title">
              Start investing today
            </h3>

            <form action="register.php" method="post" class="rform">
              <div class="form__group">
                <input placeholder="First Name" name="fname" class="form-control form__field" type="text" required>
              </div>
              <div class="form__group">
                <input placeholder="Last Name" name="lname" class="form-control form__field" type="text" required>
              </div>
              <div class="form__group">
                <input placeholder="Email Address" name="email" class="form-control form__field" type="email" required>
                <div id="emailerr"></div>
              </div>
              <div class="form__group">
                <input placeholder="Phone Number" id="phone" name="phone" class="form-control form__field" type="text" required>
                <div id="phoneerr"></div>
              </div>
              <hr>
              <div class="form__group">
                <input placeholder="Bank Name" name="bank" class="form-control form__field" type="text" required>
              </div>

              <div class="form__group">
                <input placeholder="Account Name" name="accname" class="form-control form__field" type="text" required>
              </div>

              <div class="form__group">
                <input placeholder="Account Number" name="accno" class="form-control form__field" type="text" required>
              </div>

              <div class="form__group">
                <select name="acctype" class="form-control form__field" required>
                  <option value="" selected disabled>Savings or Current</option>
                  <option value="savings">Savings</option>
                  <option value="current">Current</option>
                </select>
              </div>
              <hr>

              <div class="form__group">
                <input placeholder="Password" name="password1" class="form-control form__field" type="password" required>
              </div>

              <div class="form__group">
                <input placeholder="Confirm Password" name="password2" class="form-control form__field" type="password" required>
              </div>


              <div class="form__group">
                <select name="package" class="form-control form__field" required>
                  <option value="" selected disabled>Select a plan</option>
                  <option value="2k">2,000 </option>
                  <option value="4k">4,000 </option>
                </select>
              </div>


              <div class="form__group">
                <select name="plan" class="form-control form__field" required>
                  <option value="" selected disabled>Select a Matrix</option>
                  <option value="2">2:1 </option>
                  <option value="4">4:1 </option>
                </select>
              </div>
              <div class="form__group d-flex justify-content-center my-5">
                <button type="submit" class="btn btn__primary btn--lg btn--rounded">
                  Sign up
                </button>
              </div>
            </form>
            <p class="card__link"><a href="login.php"> Have an account? </a> </p>
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