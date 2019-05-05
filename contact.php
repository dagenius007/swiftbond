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
                    <li class="active"  role="presentation"><a href="contact.php">Contact Us</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><span class="glyphicon glyphicon-user" > </span> Account<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="login.php"> <span class="glyphicon glyphicon-new-window"></span> Login</a></li>
                            <li role="presentation"><a href="register.php"> <span class="glyphicon glyphicon-edit"></span> Register</a></li>
                        </ul>
                    </li>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="bar col-md-12 ">
          <h4>CONTACT US</h4>
        </div>
        <div class="col-md-12">
          <form action="sendmail.php" method="post" class="">
            <h3>CONTACT US</h3>
            <br>
            <div class="row">
              <div class="col-sm-6">
                  <label class="control-label" for="name">NAME :</label>
                <input class="form-control" type="text" name="Name" required>
              </div>

              <div class="col-sm-6">
                <label class="control-label" for="email">EMAIL :</label>
                <input class="form-control" type="email" name="Email" required>
              </div>
              <div class="col-sm-6">
                <label class="control-label" for="email">SUBJECT :</label>
                <input class="form-control" type="subject" name="Subject" required>
              </div><br>
              <div class="col-sm-6">
                  <label class="control-label" for="password">MESSAGE :</label>
                  <textarea class="form-control" name="Message" rows="8" cols="80"></textarea>
              </div>
              <br>
              <br>
              <br>
            </div>

            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <br>
                <br>
                <button type="submit" name="send"  class="btn btn-success btn-ra btn-block"><span class="glyphicon glyphicon-send"></span> Send</button>
                <br>
                <br>
                <br>

              </div>

            </div>
        </form>
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
