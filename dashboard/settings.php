<?php
require("auth.php");
if ($_SESSION['package'] == "") {
  header("Location:index.php");
  exit;
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Settings | Bloom</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php include('includes/css.ext'); ?>
</head>

<body class="dashboard">
  <?php include('includes/nav.ext'); ?>

  <div class="content">

    <div class="container">
      <div class="page__header">
        <h2 class="page__title">Settings</h2>
      </div>
      <div class="row justify-content-center no-gutters">
        <div class="col-md-8 col-sm-10 col-12 col-lg-7">
          <div>
            <?php
            if (isset($_GET['n'])) {
              if ($_GET['n'] == "pkgscss" && isset($_GET['p'])) {
                echo '
        <div class="alert alert-success" role="alert">
            <strong>Congratulations!</strong> You have successfully selected the ';
                if ($_GET['p'] == "a") {
                  echo "Starter";
                }
                if ($_GET['p'] == "b") {
                  echo "Silver";
                }
                if ($_GET['p'] == "c") {
                  echo "Gold";
                }
                if ($_GET['p'] == "d") {
                  echo "Ultimate";
                }
                if ($_GET['p'] == "e") {
                  echo "Platinum";
                }
                echo " Package";
                echo '</div>
     ';
              }
            }
            ?>
            <div>
              <div>
                <div>
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title" style="font-size: 20px;font-weight: bold;">General Settings</div>
                    </div>
                    <div class="card-body">
                      <div class="panel-body panel-body-inputin">
                        <form role="form" action="saveSettings.php" name="settingsform" id="settingsform" method="post">


                        <div class="form__group">
                            <input name="fname" class="form-control form__field" type="text" value="<?php echo $_SESSION['fname']; ?>" placeholder="First Name">
                          </div>
                          <div class="form__group">
                            <input name="lname" type="text" class="form-control form__field" value="<?php echo $_SESSION['lname']; ?>" placeholder="Last Name">
                          </div>

                          <div class="form__group">
                              <input class="form-control form__field" placeholder="Email Address" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" type="email" disabled>                            
                          </div>

                       

                          <div class="form__group">
                          <input name="phone" type="text" class="form-control form__field" value="<?php echo $_SESSION['phone']; ?>" placeholder="Phone Number">
                          </div>

                          <div class="form__group">
                            <input type="password" name="password" class="form-control form__field" placeholder="Password">
                            <div class="col-md-4 jlkdfj1">
                              <p class="help-block" style="font-size:1rem">Edit to change password.</p>
                            </div>
                          </div>

                          <div class="form__group">
                          <input type="password" name="password2" class="form-control form__field" placeholder="Confirm Password">
                          </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--Account Settings-->
                <div style="margin-top: 20px; margin-bottom: 20px">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title" style="font-size: 17px;font-weight: bold;">Account Settings</div>
                    </div>
                    <div class="card-body">
                      <div class="panel-body panel-body-inputin">



                        <div class="form__group">
                          <input name="bankname" type="text" class="form-control form__field" value="<?php echo $_SESSION['bankname']; ?>" placeholder="Bank Name">
                        </div>

                        <div class="form__group">
                          <input name="accname" type="text" class="form-control form__field" value="<?php echo $_SESSION['accname']; ?>" placeholder="Account Name">
                        </div>

                        <div class="form__group">
                          <input name="accno" type="text" class="form-control form__field" value="<?php echo $_SESSION['acno']; ?>" placeholder="Account Number">
                        </div>

                        <div class="form__group">
                          <input name="acctype" type="text" class="form-control form__field" placeholder="Current/Savings" value="<?php echo $_SESSION['acctype']; ?>">
                        </div>
                        <div style="float: right;">
                          <button onclick="saveForm()" id="savebtn" name="submit" class="btn btn__primary btn--rounded btn-lg">Save Changes</button>
                        </div>
                        </form>
                      </div>
                      <p id="check-e" align="right"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('includes/scripts.ext'); ?>
  <script>
    function saveForm() {
      var data = $("#settingsform").serialize();
      $.ajax({
        type: 'POST',
        url: 'saveSettings.php',
        data: data,
        beforeSend: function() {
          $("#savebtn").html('Saving...');
        },
        success: function(response) {
          if (response == "All done" || response == "SavedAll done") {
            $("#savebtn").text("Saved");
            $("#check-e").fadeOut();
            setTimeout('window.location.href="index.php"', 2000);
          } else if (response == "Mismatch") {
            $("#pwdchk").fadeIn(1000, function() {
              $("#check-e").fadeIn();
              $("#pwdchk").html('<span style="color:darkred;">Password mismatch. Try again!</span>');
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-size:12px">The passwords do not match. Scroll up and try again!</span>');
              $("#savebtn").text('Save Changes');
            });
          } else if (response == "ppp") {
            $("#check-e").fadeIn(1000, function() {
              $("#check-e").fadeIn();
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-size:12px">Please enter your phone number.</span>');
              $("#savebtn").text('Save Changes');
            });
          } else {
            $("#check-e").fadeIn(1000, function() {
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-size:12px">' + response + '</span>');
              $("#savebtn").text('Save Changes');
            });
          }
        }
      });
      return false;
    }
  </script>
</body>

</html>