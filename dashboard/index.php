<?php
require("auth.php");
require('connectdb.ext');
if ($_SESSION['package'] == "") {
  header("Location:selectPackage.php");
  exit;
}
//Check if the account has upline
$sql = "SELECT * FROM `users` WHERE `email` ='" . $_SESSION['email'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  // Merge to a person awaiting downline
  if ($row['upay'] === "" || null) {
    //check plan
    $sql = 'SELECT * FROM `users` WHERE `upayv` = "11" and `package` = "' . $_SESSION['package'] . '" and `plan` = "' . $_SESSION['plan'] . '" and  (`dpay1` = "" or `dpay2` = "") and `email` <> "' . $_SESSION['email'] . '"';
    $result = $conn->query($sql);
    // print_r($result);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      //Merge based on matrix

      // print_r()
     
      if ($_SESSION['plan'] === '2') {
        if ($row['dpay1'] == "") {
          $sql = "UPDATE `users` SET `dpay1`='" . $_SESSION['email'] . "' WHERE `email` = '" . $row['email'] . "'";
          if ($conn->query($sql) === TRUE) {
            //do nothing
          }
        } else if ($row['dpay2'] == "") {
          $sql = "UPDATE `users` SET `dpay2`='" . $_SESSION['email'] . "' WHERE `email` = '" . $row['email'] . "'";
          if ($conn->query($sql) === TRUE) {
            //do nothing
          }
        }
      } else {
        if ($row['dpay1'] == "") {
          $sql = "UPDATE `users` SET `dpay1`='" . $_SESSION['email'] . "' WHERE `email` = '" . $row['email'] . "'";

          if ($conn->query($sql) === TRUE) {
            //do nothing
          }
        } else if ($row['dpay2'] == "") {
          $sql = "UPDATE `users` SET `dpay2`='" . $_SESSION['email'] . "' WHERE `email` = '" . $row['email'] . "'";
          if ($conn->query($sql) === TRUE) {
            //do nothing
          }
        } else if ($row['dpay3'] == "") {
          $sql = "UPDATE `users` SET `dpay3`='" . $_SESSION['email'] . "' WHERE `email` = '" . $row['email'] . "'";

          if ($conn->query($sql) === TRUE) {
            //do nothing
          }
        } else if ($row['dpay4'] == "") {
          $sql = "UPDATE `users` SET `dpay4`='" . $_SESSION['email'] . "' WHERE `email` = '" . $row['email'] . "'";
          if ($conn->query($sql) === TRUE) {
            //do nothing
          }
        }
      }

      $sql = "UPDATE `users` SET `upay`='" . $row['email'] . "' WHERE `email` = '" . $_SESSION['email'] . "'";

      if ($conn->query($sql) === TRUE) {
        //do nothing
      }
    }
  }
} else {
  //..do nothing
}



if (!isset($row['email'])) {
  header("Location:../");
  exit;
}


?>


<!DOCTYPE HTML>
<html>

<head>
  <title>Dashboard | Bloom</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php include('includes/css.ext'); ?>
</head>

<body class="dashboard">
  <?php include('includes/nav.ext'); ?>
  <div class="content">
    <div class="container">

      <div class="page__header">
        <h2 class="page__title">Dashboard</h2>
      </div>
      <div>
        <div>
          <div>
            <?php
            //get upline1 details
            $sql = "SELECT * FROM `users` WHERE `email` = '" . $_SESSION['upay'] . "' ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();

              ?>
              <h3><b>YOUR UPLINE</b></h3>
              <p>Details of the person you are donating to.</p>
              <ul style="font-size: 16px">
                <li><b>First Name:</b> <?php echo $row['firstname']; ?></li>
                <li><b>Last Name:</b> <?php echo $row['lastname']; ?></li>
                <li><b>Bank Name:</b> <?php echo $row['bankname']; ?></li>
                <li><b>Account Name: </b> <?php echo $row['accname']; ?></li>
                <li><b>Account Number:</b> <?php echo $row['acno'] . " - " . $row['acctype']; ?></li>
                <li><b>Amount:</b> ₦<?php if ($row['package'] == "2k") {
                                      echo "2,000";
                                    } else if ($row['package'] == "4k") {
                                      echo "4,000";
                                    } ?></li>
                <li><b>Phone Number:</b> <?php echo $row['phone']; ?></li>
              </ul>

              <?php if ($_SESSION['upayv'] == "1") {
                echo '<a class="btn btn-default disabled" href="paid.php?rdr=3e7a5abf659d1c90b2760d830ca67ba1" style="font-size: 13px">Pending Confirmation...';
              } else if ($_SESSION['upayv'] == "11") {
                echo '<a class="btn btn-default disabled" href="#" style="font-size: 13px">Payment Confirmed';
              } else {
                echo '<a class="btn btn-default" href="paid.php?rdr=3e7a5abf659d1c90b2760d830ca67ba1" style="font-size: 13px">I have paid';
              } ?></a>
            </div>
          <?php } else {
          echo 'No upline yet';
        } ?>


          <?php
          if ($_SESSION['upayv'] == "") {
            echo '<br><span style="color:#999">You have to pay your upline first.</span>';
          }
          elseif ($_SESSION['dpay1'] == "" && $_SESSION['dpay2'] == "" && $_SESSION['dpay3'] == "" && $_SESSION['dpay4'] == "") {
            echo '<div class="mt-5">
											 <h3><b>YOUR DOWNLINES</b></h3>
											 <p>Details of the people donating to you.</p>
											 <ul style="font-size: 14px">
												 Sorry, no one has been matched to you yet. Please check back later.';
            
            echo '</ul>
                         <p  style="font-size: 12px;margin-top:30px;"><i>It takes at most 6 hours to get matched completely</i></p>
												 </div>
									 </div>
								 </div>';
          } else {
            //Get downline details

            if ($_SESSION['dpay1'] != "") {
              $sql = "SELECT * FROM `users` WHERE `email` = '" . $_SESSION['dpay1'] . "'";
              $result1 = $conn->query($sql);

              if ($result1->num_rows > 0) {

                $row1 = $result1->fetch_assoc();
              }
              $conn->close();
            }
            if ($_SESSION['dpay2'] != "") {
              require('connectdb.ext');
              $sql = "SELECT * FROM `users` WHERE `email` = '" . $_SESSION['dpay2'] . "'";
              $result2 = $conn->query($sql);

              if ($result2->num_rows > 0) {

                $row2 = $result2->fetch_assoc();
              }
              $conn->close();
            }
            if ($_SESSION['dpay3'] != "") {
              require('connectdb.ext');
              $sql = "SELECT * FROM `users` WHERE `email` = '" . $_SESSION['dpay2'] . "'";
              $result3 = $conn->query($sql);

              if ($result3->num_rows > 0) {

                $row3 = $result3->fetch_assoc();
              }
              $conn->close();
            }
            if ($_SESSION['dpay4'] != "") {
              require('connectdb.ext');
              $sql = "SELECT * FROM `users` WHERE `email` = '" . $_SESSION['dpay2'] . "'";
              $result4 = $conn->query($sql);

              if ($result4->num_rows > 0) {
                $row4 = $result4->fetch_assoc();
              }
              $conn->close();
            }
            ?>



            <div class="container-fluid">
              <div class="row">
                <?php echo '<div class="col-md-6">
								 <h3><b>YOUR DOWNLINES</b></h3>
								 <p>Details of the people donating to you.</p><br>
								 <table class="table" style="color:#777">
				 <thead>
					 <tr>
						 <th>Name</th>
             <th>Phone Number</th>
             <th>Action Button</th>
             <th>Status</th>
             
					 </tr>
				 </thead>
				 <tbody>
					 <tr>';
                if (isset($row1['firstname'])) {
                  echo '
						 <td>' . $row1['firstname'] . ' ' . $row1['lastname'] . '</td>
						 <td>' . $row1['phone'] . '</td>
						 <td>';
                  if ($row1['upayv'] == "11" ) {
                    echo '<span style="width:120px;background:#75a156;padding:4px 8px;color:rgba(255,255,255,0.8)"><i class="fa fa-check-circle"></i> Confirmed';
                  } else {
                    echo '<span style="background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Not Verified';
                  }
                  echo '</span>';
                  if ($row1['upayv'] == "1") {
                    echo ' <a class="btn btn-success" style="background:#75a156e6;padding:4px;"  data-toggle="modal" data-target="#confirm1"><i class="fa fa-check-circle"></i></a>';
                  }
                  else{
                    echo '<span style="background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Awaiting confirmation';
                  }
                  if ($row1['upayv'] != "11") {
                    echo '<button class="btn btn-danger" type="button" style="padding:4px;height:26px;font-size:14px;"  data-toggle="modal" data-target="#delete1"><i class="fa fa-trash-o"></i>Flush</a> ';
                  }
                }
                echo '</td>
					 </tr>
					 <tr>';
                if (isset($row2['firstname'])) {
                  echo '
						 <td>' . $row2['firstname'] . ' ' . $row2['lastname'] . '</td>
						 <td>' . $row2['phone'] . '</td>
						 <td>';
                  if ($row2['upayv'] == "11" ) {
                    echo '<span style="width:120px;background:#75a156;padding:4px 8px;color:rgba(255,255,255,0.8)"><i class="fa fa-check-circle"></i> Confirmed';
                  } else {
                    echo '<span style="background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Not Verified';
                  }
                  echo '</span>';
                  if ($row2['upayv'] == "1") {
                    echo ' <a class="btn btn-success" style="background:#75a156e6;padding:4px;"  data-toggle="modal" data-target="#confirm2"><i class="fa fa-check-circle"></i></a>';
                  }
                  else{
                    echo '<span style="background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Awaiting confirmation';
                  }
                  if ($row2['upayv'] != "11") {
                    echo '<button class="btn btn-danger" type="button" style="padding:4px;height:26px;font-size:14px;"  data-toggle="modal" data-target="#delete2"><i class="fa fa-trash-o"></i>Flush</a> ';
                  }
                }
                echo '</td>
					 </tr>
           <tr>';
                if (isset($row3['firstname'])) {
                  echo '
						 <td>' . $row3['firstname'] . ' ' . $row3['lastname'] . '</td>
						 <td>' . $row3['phone'] . '</td>
						 <td>';
                  if ($row3['upayv'] == "11" ) {
                    echo '<span style="width:120px;background:#75a156;padding:4px 8px;color:rgba(255,255,255,0.8)"><i class="fa fa-check-circle"></i> Confirmed';
                  } else {
                    echo '<span style="background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Not Verified';
                  }
                  echo '</span>';
                  if ($row3['upayv'] == "1") {
                    echo ' <a class="btn btn-success" style="background:#75a156e6;padding:4px;"  data-toggle="modal" data-target="#confirm3"><i class="fa fa-check-circle"></i></a>';
                  }
                  else{
                    echo '<span style="background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Awaiting confirmation';
                  }
                  if ($row3['upayv'] != "11") {
                    echo '<button class="btn btn-danger" type="button" style="padding:4px;height:26px;font-size:14px;"  data-toggle="modal" data-target="#delete3"><i class="fa fa-trash-o"></i>Flush</a> ';
                  }
                }
                echo '</td>
           </tr>
           
           <tr>';
                if (isset($row4['firstname'])) {
                  echo '
						 <td>' . $row4['firstname'] . ' ' . $row4['lastname'] . '</td>
						 <td>' . $row4['phone'] . '</td>
						 <td>';
                  if ($row4['upayv'] == "11" ) {
                    echo '<span style="width:120px;background:#75a156;padding:4px 8px;color:rgba(255,255,255,0.8)"><i class="fa fa-check-circle"></i> Confirmed';
                  } else {
                    echo '<span style="background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Not Verified';
                  }
                  echo '</span>';
                  if ($row4['upayv'] == "1") {
                    echo ' <a class="btn btn-success" style="background:#75a156e6;padding:4px;"  data-toggle="modal" data-target="#confirm4"><i class="fa fa-check-circle"></i></a>';
                  }
                  else{
                    echo '<span style="background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Awaiting confirmation';
                  }
                  if ($row4['upayv'] != "11") {
                    echo '<button class="btn btn-danger" type="button" style="padding:4px;height:26px;font-size:14px;"  data-toggle="modal" data-target="#delete4"><i class="fa fa-trash-o"></i>Flush</a> ';
                  }
                }
                echo '</td>
					 </tr>

				 </tbody>
			 </table>

					 <p align="right" style="font-size: 12px;"><i>Make sure you receive payment before you confirm anybody.</i></p> </div>
						';
              }
              ?>
            </div>
          </div>
        </div>



       <!-- Confirm User -->

       <?php  require("includes/confirm-page.php"); ?>
        


        <!---Delete user !-->
        <?php  require("includes/delete-page.php"); ?>


      </div>
    </div>
  </div>
  <?php include('includes/scripts.ext'); ?>
</body>

</html>