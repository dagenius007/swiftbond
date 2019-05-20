<?php
		session_start();
		require('connectdb.ext');
		if(isset($_POST['email']) && isset($_POST['password1']))
		{
      
			$email = trim($_POST['email']);
			$pwd = trim($_POST['password1']);
			try{
        
				$sql = "SELECT * FROM `users` where `email` = '".$_POST['email']."'";
        $result = $conn->query($sql);

			if ($result->num_rows > 0) {
       
				echo "<script>alert('Details already exist')</script>";
				$conn->close();
				exit;
				}
				else{
          

					if ($_POST['password1'] != $_POST['password2']) {
            
						echo "<script>alert('Password Mismatch')</script>";
					}
					else
					{
           
						require('connectdb.ext');
						$sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `package`, `plan`, `acno`, `bankname`, `accname`, `phone`)
						VALUES ('".$_POST['fname']."', '".$_POST['lname']."','".$_POST['email']."','".$_POST['password1']."',
						'".$_POST['package']."', '".$_POST['plan']."', '".$_POST['accno']."','".$_POST['bank']."','".$_POST['accname']."','".$_POST['phone']."')";

							if ($conn->query($sql) === TRUE) {

               
   					 $_SESSION['email']= $_POST['email'];
  					  $conn->close();
  					//  echo "Go";
              header("Location:login.php");
          }
          else {
            echo 'yyyy';
            echo mysqli_error($conn);
          }
}


		}
	}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		else{
      echo 'hello';
       //echo "<script>alert('Input email or password')</script>";
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
                            <li role="presentation"><a href="login.php"> <span class="glyphicon glyphicon-new-window"></span> Login</a></li>
                            <li class="active" role="presentation"><a href="register.php"> <span class="glyphicon glyphicon-edit"></span> Register</a></li>
                        </ul>
                    </li>

                </ul>

            </div>

        </div>

    </nav>



    <div class="container-fluid">

      <div class="row">

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

                  <label>Account Name:</label>

                  <input name="accname" class="form-control input-lg" type="text" required>

                  </div>

                  <div class="col-md-4">

                  <label>Account Number:</label>

                  <input name="accno" class="form-control input-lg" type="text" required>

                  </div>





                  </div>





                  <br><hr><br>



                  <br>





                  <div class="row">



                  <div class="col-md-6">

                  <label>Choose Password:</label>

                  <input name="password1" class="form-control input-lg" type="password" required>

                  </div>

                  <div class="col-md-6">

                  <label>Re-enter Password:</label>

                  <input name="password2" class="form-control input-lg" type="password" required>

                  </div>

                </div>

                <br><br><br>

                  <div class="row">



                  <div class="col-md-12">

                  <label>Type of Account : </label>

                  <input name="acctype" class="form-control input-lg" type="text" placeholder="Savings or Current" required>

                  </div>

                  </div>

                  <br><br><br>



                  <div class="row">



                  <div class="col-md-12">

                  <label>SELECT A PLAN:</label>


                  <select name="package" class="form-control input-lg" required>

                    <option value="2k">2,000 </option>

                    <option value="4k">4,000 </option>

                  </select>



                  <br>

                  <br>

                  <label>SELECT A MERGE TYPE:</label>


                  <select name="plan" class="form-control input-lg" required>

                    <option value="2">2 by 2 </option>

                    <option value="4">4 by 4 </option>

                  </select>



                  <br>

                  <br>

                <input type="submit" name="register" class="btn btn-3d btn-ra btn-block" value="REGISTER">

                <br>

                <br>

                <br>

                </form>

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
