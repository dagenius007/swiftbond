<?php
  require("auth.php");
  require('connectdb.ext');
	if($_SESSION['package']=="")
	{
		header("Location:selectPackage.php");
		exit;
	}
       //Check if the account has upline
        $sql = "SELECT * FROM `users` WHERE `email` ='".$_SESSION['email']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Merge to a person awaiting downline
        if($row['upay'] === "" || null){
      
          //check plan
          $sql = 'SELECT * FROM `users` WHERE `upayv` = "11" and `package` = "'.$_SESSION['package'].'" and `plan` = "'.$_SESSION['plan'].'" and  (`dpay1` = "" or `dpay2` = "") and `email` <> "'.$_SESSION['email'].'"';
          $result = $conn->query($sql);
          
        

          if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();

            //Merge based on matrix
            if($_SESSION['plan'] === '2'){
              if ($row['dpay1']=="") {
                $sql = "UPDATE `users` SET `dpay1`='".$_SESSION['email']."' WHERE `email` = '".$row['email']."'" ;
  
                if ($conn->query($sql) === TRUE) {
                  //do nothing
                }
  
              }
              else if($row['dpay2']=="") {
                $sql = "UPDATE `users` SET `dpay2`='".$_SESSION['email']."' WHERE `email` = '".$row['email']."'" ;
                if ($conn->query($sql) === TRUE) {
                  //do nothing
                }
  
              }
            }
            else{
              if ($row['dpay1']=="") {
                $sql = "UPDATE `users` SET `dpay1`='".$_SESSION['email']."' WHERE `email` = '".$row['email']."'" ;
  
                if ($conn->query($sql) === TRUE) {
                  //do nothing
                }
  
              }
              else if($row['dpay2']=="") {
                $sql = "UPDATE `users` SET `dpay2`='".$_SESSION['email']."' WHERE `email` = '".$row['email']."'" ;
                if ($conn->query($sql) === TRUE) {
                  //do nothing
                }
  
              }
              else if ($row['dpay3']=="") {
                $sql = "UPDATE `users` SET `dpay3`='".$_SESSION['email']."' WHERE `email` = '".$row['email']."'" ;
  
                if ($conn->query($sql) === TRUE) {
                  //do nothing
                }
  
              }
              else if($row['dpay4']=="") {
                $sql = "UPDATE `users` SET `dpay4`='".$_SESSION['email']."' WHERE `email` = '".$row['email']."'" ;
                if ($conn->query($sql) === TRUE) {
                  //do nothing
                }
  
              }
            } 
  
             $sql = "UPDATE `users` SET `upay`='".$row['email']."' WHERE `email` = '".$_SESSION['email']."'" ;

            if ($conn->query($sql) === TRUE) {
              //do nothing
            }
          }

          
         

        }
      }
      else{
          //..do nothing
      }
       


  if(!isset($row['email'])){
      header("Location:../");
      exit;
  }


?>


<!DOCTYPE HTML>
<html>
<head>
<title>Dashboard :: MoneyGrabs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
   <script src="js/jquery-1.10.2.min.js"></script>

</head>
 <body>
<div class="container-fluid">
       <div class="header-section">
		<?php include('nm.ext');?>
			</div>
          <div class="">
          		<h2 style="font-family: Segoe UI;font-weight: lighter;">Dashboard</h2>
          </div>

       <div class="container-fluid">
				 <div class="row">
					 <div class="col-md-4" style="padding:40px;">
           <?php
              //get upline1 details
                  $sql = "SELECT * FROM `users` WHERE `email` = '".$_SESSION['upay']."' ";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                  
            ?>
								 <h3><b>YOUR UPLINE</b></h3>
								 <p>Details of the person you are donating to.</p>
								 <ul style="font-family: calibri;font-size: 16px">
                      <li><b>First Name:</b> <?php echo $row['firstname'];?></li>
                      <li><b>Last Name:</b> <?php echo $row['lastname'];?></li>
                      <li><b>Bank Name:</b> <?php echo $row['bankname'];?></li>
                      <li><b>Account Name: </b> <?php echo $row['accname']; ?></li>
                      <li><b>Account Number:</b> <?php echo $row['acno']." - ".$row['acctype']; ?></li>
                      <li><b>Amount:</b> ₦<?php if($row['package']=="2k"){echo "2,000";}else if($row['package']=="4k"){echo "4,000";}?></li>
                      <li><b>Phone Number:</b> <?php echo $row['phone']; ?></li>
								 </ul>

							 <?php if($_SESSION['upayv']=="1"){echo '<a class="btn btn-default disabled" href="paid.php?rdr=3e7a5abf659d1c90b2760d830ca67ba1" style="font-size: 13px">Pending Confirmation...';}
							 else if($_SESSION['upayv']=="11"){echo '<a class="btn btn-default disabled" href="#" style="font-size: 13px">Payment Confirmed';} else{echo '<a class="btn btn-default" href="paid.php?rdr=3e7a5abf659d1c90b2760d830ca67ba1" style="font-size: 13px">I have paid';}?></a>
					 </div>
                  <?php }
                  
                  else{
                    echo 'No upline yet';
                  }?>


								 <?php
									 if ($_SESSION['dpay1']=="" && $_SESSION['dpay2']=="" && $_SESSION['dpay3']=="") {
										 echo '<div class="col-md-4" style="padding:40px;">
											 <h3><b>YOUR DOWNLINES</b></h3>
											 <p>Details of the people donating to you.</p>
											 <ul style="font-family: calibri;font-size: 14px">
												 Sorry, no one has been matched to you yet. Please check back later.';
												 if($_SESSION['upay1v']=="" && $_SESSION['upay2v']=="" ){echo '<br><span style="color:#999">You have to pay your upline first.</span>';}
												 echo '</ul>
                         <p  style="font-size: 12px;margin-top:30px;"><i>It takes at most 6 hours to get matched completely</i></p>
												 </div>
									 </div>
								 </div>';
							 }

          else{
                //Get downline details

             if($_SESSION['dpay1'] != "")
             {
                 $sql = "SELECT * FROM `users` WHERE `email` = '".$_SESSION['dpay1']."'";
                 $result1 = $conn->query($sql);

                if ($result1->num_rows > 0) {

                  $row1 = $result1->fetch_assoc();
                }
                $conn->close();
             }
             if($_SESSION['dpay2']!="")
             {
                require('connectdb.ext');
                 $sql = "SELECT * FROM `users` WHERE `email` = '".$_SESSION['dpay2']."'";
                 $result2 = $conn->query($sql);

      if ($result2->num_rows > 0) {

        $row2 = $result2->fetch_assoc();
      }
      $conn->close();
		}
         if($_SESSION['dpay3']!="")
             {
                require('connectdb.ext');
                 $sql = "SELECT * FROM `users` WHERE `email` = '".$_SESSION['dpay2']."'";
                 $result3 = $conn->query($sql);

      if ($result3->num_rows > 0) {

        $row3 = $result3->fetch_assoc();
      }
      $conn->close();
    }
    ?>



           <div class="container-fluid">
						 <div class="row">
							 <?php echo '<div class="col-md-6">
								 <h3><b>YOUR DOWNLINES</b></h3>
								 <p>Details of the people donating to you.</p><br>
								 <table class="table" style="font-family: calibri;color:#777">
				 <thead>
					 <tr>
						 <th>Name</th>
						 <th>Phone Number</th>
						 <th>Status</th>
					 </tr>
				 </thead>
				 <tbody>
					 <tr>';
						 if (isset($row1['Firstname'])){
							 echo '
						 <td>'.$row1['Firstname'].' '.$row1['Lastname'].'</td>
						 <td>'.$row1['phone'].'</td>
						 <td>';
							if($row1['upay1v']=="11"  || $row1['upay2v']=="11"  ){echo '<span style="width:120px;background:#75a156;padding:4px 8px;color:rgba(255,255,255,0.8)"><i class="fa fa-check-circle"></i> Confirmed';}
							 else{echo '<span style="background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Not Verified';}
							 echo '</span>';
						 if($row1['upay1v']=="1" || $row1['upay2v']=="1"){
							 echo ' <a class="btn btn-success" style="background:#75a156e6;padding:4px;"  data-toggle="modal" data-target="#myModali"><i class="fa fa-check-circle"></i></a>';
						 }
						 if($row1['upay1v']!="11" || $row1['upay2v']!="11" ){
						 echo '<button class="btn btn-danger" type="button" style="padding:4px;height:26px;font-size:14px;"  data-toggle="modal" data-target="#myModalii"><i class="fa fa-trash-o"></i>Flush</a> ';}
					  }
						 echo '</td>
					 </tr>
					 <tr style="line-height:0px">
						 ';
                   if (isset($row2['Firstname'])){
               echo '
             <td>'.$row2['Firstname'].' '.$row1['Lastname'].'</td>
             <td>'.$row2['phone'].'</td>
             <td>';
              if($row2['upay1v']=="11"  || $row2['upay2v']=="11"  ){echo '<span style="width:120px;background:#75a156;padding:4px 8px;color:rgba(255,255,255,0.8)"><i class="fa fa-check-circle"></i> Confirmed';}
               else{echo '<span style="background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Not Verified';}
               echo '</span>';
             if($row2['upay1v']=="1" || $row2['upay2v']=="1"){
               echo ' <a class="btn btn-success" style="background:#75a156e6;padding:4px;"  data-toggle="modal" data-target="#myModali"><i class="fa fa-check-circle"></i></a>';
             }
             if($row2['upay1v']!="11" || $row2['upay2v']!="11" ){
             echo '<button class="btn btn-danger" type="button" style="padding:4px;height:26px;font-size:14px;"  data-toggle="modal" data-target="#myModalii"><i class="fa fa-trash-o"></i>Flush</a> ';}
           }
             echo '</td>
           </tr>
           <tr style="line-height:0px">
             ';
						 if (isset($row3['Firstname'])){
							 echo '
						 <td>'.$row3['Firstname'].' '.$row3['Lastname'].'</td>
						 <td>'.$row3['phone'].'</td>
						 <td>';
						 if($row3['upay1v']=="11"|| $row3['upay2v']=="11"){echo '<span style="width:120px;background:#75a156;padding:4px 8px;color:rgba(255,255,255,0.8)"><i class="fa fa-check-circle"></i> Confirmed';}
							 else{echo '<span style="width:100px;background:rgba(206, 117, 26, 0.83);padding:4px;color:rgba(255,255,255,0.8)"><i class="fa fa-times-circle"></i> Not Verified';}
							 echo '</span>';
						 if($row3['upay1v']=="1"|| $row3['upay2v']=="1"){
							 echo ' <a class="btn btn-success" style="margin-left:5px;background:#75a156e6;padding:4px;width:25px"  title="Confirm Payment" data-toggle="modal" data-target="#myModaliii"><i class="fa fa-check-circle"></i></a>';
						 }
						 if($row3['upay1v']!="11" || $row3['upay2v']!="11"){
							 echo '<a class="btn btn-danger" style="margin-left:3px;padding:4px;height:28px;font-size:14px;padding-top:-10px"  data-toggle="modal" data-target="#myModaliv"><i class="fa fa-trash-o"></i>Flush</a> ';
						 }
					 }
						 echo '
						 </td>
					 </tr>

				 </tbody>
			 </table>

					 <p align="right" style="font-size: 12px;"><i>Make sure you receive payment before you confirm anybody.</i></p> </div>
						';
						 }
					 ?>


				<!---->


				<!---->

				
        <!--footer section start-->

    <div class="modal fade" id="myModali" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm User</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>Are you sure you want to confirm this person? Confirm only when you've received payment.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-success" <?php echo ' href="confirmUser.php?rdr='.md5("3e7a5abf659d1c90b2760d830ca67ba1").'&du=dpay1" ';?>>Confirm Payment</a>
          </div>
        </div>
      </div>
    </div>
     <div class="modal fade" id="myModalii" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm Delete</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>Are you sure you want to delete this user? Deletion will be reviewed by the admin. Delete only when this person is trying fraud.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-danger" href="<?php echo 'deleteUser.php?rdr='.md5(md5("3e7a5abf659d1c90b2760d830ca67ba1")).'&du=dpay1';?>">Delete User</a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModaliii" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm User</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>Are you sure you want to confirm this person? Confirm only when you've received payment.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-success" <?php echo ' href="confirmUser.php?rdr='.md5("3e7a5abf659d1c90b2760d830ca67ba1").'&du=dpay2" ';?>>Confirm Payment</a>
          </div>
        </div>
      </div>
    </div>
     <div class="modal fade" id="myModaliv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm Delete</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>Are you sure you want to delete this user? Deletion will be reviewed by the admin. Delete only when this person is trying fraud.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-success" href="<?php echo 'deleteUser.php?rdr='.md5(md5("3e7a5abf659d1c90b2760d830ca67ba1")).'&du=dpay2';?>">Delete User</a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModaliii" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm User</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>Are you sure you want to confirm this person? Confirm only when you've received payment.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-success" <?php echo ' href="confirmUser.php?rdr='.md5("3e7a5abf659d1c90b2760d830ca67ba1").'&du=dpay3" ';?>>Confirm Payment</a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModaliv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm Delete</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>Are you sure you want to delete this user? Deletion will be reviewed by the admin. Delete only when this person is trying fraud.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-success" href="<?php echo 'deleteUser.php?rdr='.md5(md5("3e7a5abf659d1c90b2760d830ca67ba1")).'&du=dpay3';?>">Delete User</a>
          </div>
        </div>
      </div>
    </div>

  <footer>
			   <p>&copy 2017 MoneyMinds. All Rights Reserved</p>
			</footer>
        <!--footer section end-->
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>
