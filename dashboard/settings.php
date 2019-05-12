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
  <title>Settings | MoneyGrabs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
  <!-- Custom CSS -->
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <!-- Graph CSS -->
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- jQuery -->
  <!-- lined-icons -->
  <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <!-- //lined-icons -->
  <!-- chart -->
  <script src="js/Chart.js"></script>
  <!-- //chart -->
  <!--animate-->
  <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
  <!----webfonts--->

  <!---//webfonts--->
  <!-- Meters graphs -->
  <script src="js/jquery-1.10.2.min.js"></script>
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
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:12px">The passwords do not match. Scroll up and try again!</span>');
              $("#savebtn").text('Save Changes');
            });
          } else if (response == "ppp") {
            $("#check-e").fadeIn(1000, function() {
              $("#check-e").fadeIn();
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:12px">Please enter your phone number.</span>');
              $("#savebtn").text('Save Changes');
            });
          } else {
            $("#check-e").fadeIn(1000, function() {
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:12px">' + response + '</span>');
              $("#savebtn").text('Save Changes');
            });
          }


        }
      });
      return false;
    }
  </script>
  <!-- Placed js at the end of the document so the pages load faster -->

</head>

<body>

  <!-- left side start-->

  <!--logo and iconic logo start-->


  <style type="text/css">
    .card {
      width: 100%;
      background-color: #FFF;
      border-radius: 3px;
      box-shadow: 0 1px 2px #c8d1d3;
    }

    .card .card-header {
      padding: 30px;
      font-size: 1.1em;
      font-weight: 400;
      border-bottom: 1px solid #dfe6e8;
      border-left: 0px solid transparent;
      color: #666;
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: row;
      flex-direction: row;
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap;
      -ms-flex-align: start;
      align-items: flex-start;
      -ms-flex-pack: start;
      justify-content: flex-start;
    }

    .card .card-header .card-title {
      -ms-flex: 1;
      flex: 1;
    }

    .card .card-header .card-action {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .card .card-header .card-action>li>a {
      color: #dfe6e8;
    }

    .card .card-header .card-action>li>.dropdown-menu {
      right: 0;
      left: auto;
      border-radius: 2px;
    }

    .card .card-body {
      padding: 30px;
    }

    .card.card-mini .card-header {
      padding: 20px 30px;
    }

    .card.card-mini .card-body {
      padding: 20px 30px;
    }

    .card.card-tab .card-header {
      padding: 0;
      background-color: #f0f4f5;
      border-bottom: 0;
      overflow-x: scroll;
      overflow-y: visible;
    }

    .card.card-tab .card-header>ul,
    .card.card-tab ul.nav-tabs {
      list-style: none;
      padding: 0;
      margin-bottom: 0;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: row;
      flex-direction: row;
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap;
      -ms-flex-align: start;
      align-items: flex-start;
      -ms-flex-pack: start;
      justify-content: flex-start;
      width: 100%;
      font-weight: 400;
      border-bottom: 1px solid #dfe6e8;
    }

    .card.card-tab .card-header>ul>li,
    .card.card-tab ul.nav-tabs>li {
      display: block;
      margin-bottom: -2px;
      z-index: 10;
      width: 140px;
      min-width: 140px;
    }

    .card.card-tab .card-header>ul>li a,
    .card.card-tab ul.nav-tabs>li a {
      padding: 20px 30px;
      width: 100%;
      text-align: center;
      display: block;
      text-decoration: none;
      color: #8d9293;
      white-space: nowrap;
      text-overflow: ellipsis;
      overflow: hidden;
    }

    .card.card-tab .card-header>ul>li.active,
    .card.card-tab ul.nav-tabs>li.active {
      border-left: 1px solid #dfe6e8;
      border-right: 1px solid #dfe6e8;
      background-color: #FFF;
    }

    .card.card-tab .card-header>ul>li.active a,
    .card.card-tab ul.nav-tabs>li.active a {
      color: #29c75f;
      border-bottom: none !important;
    }

    .card.card-tab .card-header>ul>li:first-child.active,
    .card.card-tab ul.nav-tabs>li:first-child.active {
      border-left: 0;
    }

    .card.card-tab .tab-content {
      padding: 0;
      position: relative;
      transition: all 0.3s ease;
    }

    .card.card-tab .tab-content .tab-pane {
      position: absolute;
      top: auto;
      left: auto;
      bottom: auto;
      right: auto;
      width: 100%;
      height: auto;
      display: none;
      padding: 30px;
      transition: all 0.3s ease;
      opacity: 0;
    }

    .card.card-tab .tab-content .tab-pane.active {
      transform: translate(0, 0);
      position: relative;
      opacity: 1;
      display: block;
    }

    .card.card-tab>.ng-isolate-scope>.nav-tabs {
      background-color: #f0f4f5;
    }

    .card.card-tab>.ng-isolate-scope>.nav-tabs>li.active {
      border-bottom: 2px solid #FFF;
      border-left: 1px solid #dfe6e8;
      border-right: 1px solid #dfe6e8;
      background-color: #FFF;
    }

    .card.card-tab>.ng-isolate-scope>.nav-tabs>li.active a {
      color: #29c75f;
    }

    .card.card-tab>.ng-isolate-scope .tab-content .tab-pane {
      opacity: 0;
    }

    .card.card-tab>.ng-isolate-scope .tab-content .tab-pane.active {
      opacity: 1;
    }

    .card.card-tab.card-mini .card-header>li a,
    .card.card-tab.card-mini ul.nav-tabs>li a {
      padding-top: 20px;
      padding-bottom: 20px;
    }

    .card.card-banner {
      width: 100%;
      position: relative;
      overflow: hidden;
      display: block;
      border-radius: 2px;
      transition: all 0.2s ease;
    }

    .card.card-banner:hover {
      cursor: pointer;
      text-decoration: none;
    }

    .card.card-banner .card-header {
      background-color: #FFF;
    }

    .card.card-banner .card-body {
      padding: 0px;
    }

    .card.card-banner .card-body .icon {
      position: absolute;
      top: 50%;
      transform: translate(0, -50%);
      font-size: 4em;
      color: #444;
      z-index: 0;
      padding: 10px;
      min-height: 100%;
      min-width: 100px;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: row;
      flex-direction: row;
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap;
      -ms-flex-align: center;
      align-items: center;
      -ms-flex-pack: center;
      justify-content: center;
    }

    .card.card-banner .card-body .content {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap;
      -ms-flex-align: end;
      align-items: flex-end;
      -ms-flex-pack: end;
      justify-content: flex-end;
      position: relative;
      width: 100%;
      padding: 2rem;
      z-index: 100;
    }

    .card.card-banner .card-body .content .value {
      font-size: 4em;
      line-height: 3rem;
      font-weight: 200;
      padding-top: 2rem;
      color: #444;
    }

    .card.card-banner .card-body .content .value .sign {
      font-size: 0.4em;
      font-weight: 200;
      margin-right: 5px;
      opacity: 0.75;
    }

    .card.card-banner .card-body .content .title {
      font-size: 1em;
      font-weight: 400;
      color: #8d9293;
      text-transform: uppercase;
    }

    .card.card-banner .card-body::after {
      content: '';
      position: relative;
      display: block;
      clear: both;
    }

    .card.card-chart .card-header {
      border-bottom: 0;
    }

    .card.card-chart .card-header .card-title .title {
      background-color: #FFF;
      padding: 6px 12px;
      border-radius: 2px;
      font-weight: 400;
      width: auto;
      display: inline;
      text-transform: uppercase;
    }

    .card.card-green {
      background-color: #29c75f;
    }

    .card.card-green .card-body .icon {
      color: #FFF;
      background-color: rgba(255, 255, 255, 0.05);
    }

    .card.card-green .card-body .content .value {
      color: #FFF;
    }

    .card.card-green-light {
      background-color: #FFF;
    }

    .card.card-green-light .card-body .icon {
      color: #29c75f;
      background-color: rgba(41, 199, 95, 0.05);
    }

    .card.card-green-light .card-body .content .value {
      color: #29c75f;
    }

    .card.card-green-light:hover {
      background-color: #29c75f;
    }

    .card.card-green-light:hover .card-body .icon {
      color: #FFF;
      background-color: rgba(255, 255, 255, 0.1);
    }

    .card.card-green-light:hover .card-body .content .title,
    .card.card-green-light:hover .card-body .content .value {
      color: #FFF;
    }

    .card.card-green.card-chart .card-header {
      background-color: #29c75f;
      color: #29c75f;
    }

    .card.card-blue {
      background-color: #39c3da;
    }

    .card.card-blue .card-body .icon {
      color: #FFF;
      background-color: rgba(255, 255, 255, 0.05);
    }

    .card.card-blue .card-body .content .value {
      color: #FFF;
    }

    .card.card-blue-light {
      background-color: #FFF;
    }

    .card.card-blue-light .card-body .icon {
      color: #39c3da;
      background-color: rgba(57, 195, 218, 0.05);
    }

    .card.card-blue-light .card-body .content .value {
      color: #39c3da;
    }

    .card.card-blue-light:hover {
      background-color: #39c3da;
    }

    .card.card-blue-light:hover .card-body .icon {
      color: #FFF;
      background-color: rgba(255, 255, 255, 0.1);
    }

    .card.card-blue-light:hover .card-body .content .title,
    .card.card-blue-light:hover .card-body .content .value {
      color: #FFF;
    }

    .card.card-blue.card-chart .card-header {
      background-color: #39c3da;
      color: #39c3da;
    }

    .card.card-orange {
      background-color: #fc8229;
    }

    .card.card-orange .card-body .icon {
      color: #FFF;
      background-color: rgba(255, 255, 255, 0.05);
    }

    .card.card-orange .card-body .content .value {
      color: #FFF;
    }

    .card.card-orange-light {
      background-color: #FFF;
    }

    .card.card-orange-light .card-body .icon {
      color: #fc8229;
      background-color: rgba(252, 130, 41, 0.05);
    }

    .card.card-orange-light .card-body .content .value {
      color: #fc8229;
    }

    .card.card-orange-light:hover {
      background-color: #fc8229;
    }

    .card.card-orange-light:hover .card-body .icon {
      color: #FFF;
      background-color: rgba(255, 255, 255, 0.1);
    }

    .card.card-orange-light:hover .card-body .content .title,
    .card.card-orange-light:hover .card-body .content .value {
      color: #FFF;
    }

    .card.card-orange.card-chart .card-header {
      background-color: #fc8229;
      color: #fc8229;
    }

    .card.card-yellow {
      background-color: #FFBC11;
    }

    .card.card-yellow .card-body .icon {
      color: #FFF;
      background-color: rgba(255, 255, 255, 0.05);
    }

    .card.card-yellow .card-body .content .value {
      color: #FFF;
    }

    .card.card-yellow-light {
      background-color: #FFF;
    }

    .card.card-yellow-light .card-body .icon {
      color: #FFBC11;
      background-color: rgba(255, 188, 17, 0.05);
    }

    .card.card-yellow-light .card-body .content .value {
      color: #FFBC11;
    }

    .card.card-yellow-light:hover {
      background-color: #FFBC11;
    }

    .card.card-yellow-light:hover .card-body .icon {
      color: #FFF;
      background-color: rgba(255, 255, 255, 0.1);
    }

    .card.card-yellow-light:hover .card-body .content .title,
    .card.card-yellow-light:hover .card-body .content .value {
      color: #FFF;
    }

    .card.card-yellow.card-chart .card-header {
      background-color: #FFBC11;
      color: #FFBC11;
    }

    @media (max-width: 767px) {
      .card .card-header {
        padding: 15px;
      }

      .card .card-body {
        padding: 15px;
      }

      .card.card-mini .card-header {
        padding: 15px;
      }

      .card.card-mini .card-body {
        padding: 15px;
      }

      .card.card-tab .card-header {
        padding: 0;
      }

      .card.card-tab .card-body {
        padding: 0;
      }

      .card.card-tab .tab-content .tab-pane {
        padding: 15px;
      }

      .card.card-tab.card-mini .card-header>li a,
      .card.card-tab.card-mini ul.nav-tabs>li a {
        padding-top: 15px;
        padding-bottom: 15px;
      }

      .card.card-banner .card-body .icon {
        font-size: 3em;
        min-width: 80px;
      }

      .card.card-banner .card-body .content {
        padding: 1rem;
      }

      .card.card-banner .card-body .content .value {
        font-size: 3em;
        padding-top: 1rem;
      }

      .card.card-banner .card-body .content .title {
        font-size: 0.9em;
      }
    }
  </style>


  <!--logo and iconic logo end-->

  <!-- left side end-->

  <!-- main content start-->
  <div class="container-fluid">
    <!-- header-starts -->
    <div class="header-section">

      <!--toggle button start-->
      <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
      <!--toggle button end-->

      <?php include('nm.ext'); ?>
    </div>
    <!-- //header-ends -->
    <div id="page-wrapper" style="-moz-transform: scale(.95);">
      <div class="graphs">
        <div class="col_3">

          <h2 style="font-weight: lighter;">Settings</h2><br><br>
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
          <div class="row">
            <div class="col-xs-12">
              <div class="col-md-12" style="font-family: calibri">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title" style="font-size: 20px;font-family:Segoe UI;font-weight: bold;">General Settings</div>

                    <ul class="card-action">
                      <li class="dropdown">
                        <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-cogs" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Apply</a></li>
                          <li><a href="#">Reset</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="panel-body panel-body-inputin">
                      <form role="form" class="form-horizontal" action="saveSettings.php" name="settingsform" id="settingsform" method="post">

                        <div class="form-group">
                          <label class="col-md-2 control-label">Email Address</label>
                          <div class="col-md-8">
                            <div class="input-group input-icon right in-grp1">
                              <span class="input-group-addon">
                                <i class="fa fa-envelope-o"></i>
                              </span>
                              <input id="email" name="email" class="form-control1" readonly="" value="<?php echo $_SESSION['email']; ?>" type="text" placeholder="Email Address">
                            </div>
                          </div>
                          <div class="col-sm-2 jlkdfj1">
                            <p class="help-block" style="font-size:1rem">You cannot change your email</p>
                          </div>
                          <div class="clearfix"> </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Password</label>
                          <div class="col-md-8">
                            <div class="input-group input-icon right in-grp1">
                              <span class="input-group-addon">
                                <i class="fa fa-key"></i>
                              </span>
                              <input type="password" name="password" class="form-control1" value="<?php echo $_SESSION['password']; ?>" placeholder="Password">
                            </div>
                          </div>
                          <div class="col-sm-2 jlkdfj1">
                            <p class="help-block" style="font-size:1rem">Edit to change password.</p>
                          </div>
                          <div class="clearfix"> </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Confirm Password</label>
                          <div class="col-md-8">
                            <div class="input-group input-icon right in-grp1">
                              <span class="input-group-addon">
                                <i class="fa fa-key"></i>
                              </span>
                              <input type="password" name="password2" class="form-control1" placeholder="Confirm Password">
                            </div>
                          </div>
                          <div class="col-sm-2 jlkdfj1">
                            <p class="help-block" id="pwdchk" style="font-size:1rem">Re-enter password</p>
                          </div>
                          <div class="clearfix"> </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">First Name</label>
                          <div class="col-md-8">
                            <div class="input-group input-icon right in-grp1">
                              <span class="input-group-addon">
                                <i class="fa fa-quote-left"></i>
                              </span>
                              <input name="fname" class="form-control1" type="text" value="<?php echo $_SESSION['fname']; ?>" placeholder="First Name">
                            </div>
                          </div>

                          <div class="clearfix"> </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Last Name</label>
                          <div class="col-md-8">
                            <div class="input-group input-icon right in-grp1">
                              <span class="input-group-addon">
                                <i class="fa fa-quote-left"></i>
                              </span>
                              <input name="lname" type="text" class="form-control1" value="<?php echo $_SESSION['lname']; ?>" placeholder="Last Name">
                            </div>
                          </div>

                          <div class="clearfix"> </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">Phone Number</label>
                          <div class="col-md-8">
                            <div class="input-group input-icon right in-grp1">
                              <span class="input-group-addon">
                                <i class="fa fa-phone"></i>
                              </span>
                              <input name="phone" type="text" class="form-control1" value="<?php echo $_SESSION['phone']; ?>" placeholder="Phone Number">
                            </div>
                          </div>

                          <div class="clearfix"> </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <!--Account Settings-->
              <div class="col-md-12" style="font-family: calibri;margin-top: 20px;margin-bottom: 40px">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title" style="font-size: 17px;font-family:Segoe UI;font-weight: bold;">Account Settings</div>
                    <ul class="card-action">
                      <li class="dropdown">
                        <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-cogs" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Apply</a></li>
                          <li><a href="#">Reset</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="panel-body panel-body-inputin">



                      <div class="form-group">
                        <label class="col-md-2 control-label">Bank Name</label>
                        <div class="col-md-8">
                          <div class="input-group input-icon right in-grp1">
                            <span class="input-group-addon">
                              <i class="fa fa-pencil-square-o"></i>
                            </span>
                            <input name="bankname" type="text" class="form-control1" value="<?php echo $_SESSION['bankname']; ?>" placeholder="Bank Name">
                          </div>
                        </div>

                        <div class="clearfix"> </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-2 control-label">Account Name</label>
                        <div class="col-md-8">
                          <div class="input-group input-icon right in-grp1">
                            <span class="input-group-addon">
                              <i class="fa fa-pencil-square-o"></i>
                            </span>
                            <input name="accname" type="text" class="form-control1" value="<?php echo $_SESSION['accname']; ?>" placeholder="Account Name">
                          </div>
                        </div>

                        <div class="clearfix"> </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-2 control-label">Account Number</label>
                        <div class="col-md-8">
                          <div class="input-group input-icon right in-grp1">
                            <span class="input-group-addon">
                              <i class="fa fa-pencil-square-o"></i>
                            </span>
                            <input name="accno" type="text" class="form-control1" value="<?php echo $_SESSION['acno']; ?>" placeholder="Account Number">
                          </div>
                        </div>

                        <div class="clearfix"> </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-2 control-label">Account Type</label>
                        <div class="col-md-8">
                          <div class="input-group input-icon right in-grp1">
                            <span class="input-group-addon">
                              <i class="fa fa-pencil-square-o"></i>
                            </span>
                            <input name="acctype" type="text" class="form-control1" placeholder="Current/Savings" value="<?php echo $_SESSION['acctype']; ?>">
                          </div>
                        </div>

                        <div class="clearfix"> </div>
                      </div>
                      <div style="float: right;">

                        <a class="btn btn-default" href="index.php">Close</a>
                        <a onclick="saveForm()" id="savebtn" name="submit" class="btn btn-primary">Save Changes</a>

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


      <!-- //switches -->

    </div>
  </div>
  <!--body wrapper start-->
  </div>
  <!--body wrapper end-->
  </div>
  <!--footer section start-->
  <footer>
    <p>&copy 2017 MoneyGrabs. All Rights Reserved</p>
  </footer>
  <!--footer section end-->

  <!-- main content end-->
  </section>


  </div>

  <script src="js/jquery.nicescroll.js"></script>
  <script src="js/scripts.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>