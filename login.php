<?php 
@include('connectdb.ext');
session_start(); ?>
<?php
		//session_start();
		require('connectdb.ext');
		if(isset($_POST['email']) && isset($_POST['pwd']))
		{
			$email = trim($_POST['email']);
			$pwd = trim($_POST['pwd']);
			try{
				$sql = "SELECT * FROM `users` where `email` = '".$email."' AND `password` = '".$pwd."'";
     $result = $conn->query($sql);

			if ($result->num_rows > 0) {

				$conn->close();

				$_SESSION['email'] = $email;
        header("Location:dashboard/index.php");
				}
				else{

					$message = "Incorrect password";
					}
		}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		else{
			//header("Location:index.php");
		}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swiftbond</title>
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
                            <li  class="active" role="presentation"><a href="login.php"> <span class="glyphicon glyphicon-new-window"></span> Login</a></li>
                            <li role="presentation"><a href="register.php"> <span class="glyphicon glyphicon-edit"></span> Register</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="bar col-md-12 ">
          <h4>LOGIN</h4>
        </div>
        <div class="container">
          <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 login-form">
              <div class="well well-lg">
                <form action="login.php" method="post" class="">
                <?php isset($message) ? $message : ""?>
                  <h3>Login to your account</h3>
                  <br>
                  <div class="form-group">
                      <label class="control-label" for="username">EMAIL :</label>
                    <input class="form-control" type="email" name="email">
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="password">PASSWORD :</label>
                    <input class="form-control" type="password" name="pwd">
                  </div>

                  <input type="submit" name="login" value="LOGIN" class="btn btn-success btn-ra btn-block">
              </form>
              </div>
                <p style="text-align: center; font-weight: bold;">Don't Have An Account? <a class='ra' href="register.php"> Register Now </a> </p>
          </div>
        </div>
      </div>
    </div>


    	<footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; Swiftbond. All Rights Reserved.
                                        </div>

                </div>
            </div>
        </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
