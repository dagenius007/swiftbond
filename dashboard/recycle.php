<?php
	require('auth.php');
	if ($_SESSION['dpay1v'] =="11" and $_SESSION['dpay2v'] =="11" and $_SESSION['upay'] !="" and $_SESSION['upayv'] =="11" and $_SESSION['dpay1'] !="" and $_SESSION['dpay2'] !="" and $_SESSION['package'] !="" ) {

		//clear cycle data
		require("connectdb.ext");
			$sql = "DELETE FROM `users` WHERE `email` = '".$_SESSION['email']."'" ;
            if ($conn->query($sql) === TRUE) {
            	$conn->close();
            	require("connectdb.ext");
			$sql = "INSERT INTO `users`(`Firstname`, `Lastname`, `email`, `password`, `package`, `upay`, `dpay1`, `dpay2`, `acno`, `bankname`, `accname`, `phone`, `upayv`, `dpay1v`, `dpay2v`, `acctype`) VALUES ('".$_SESSION['fname']."','".$_SESSION['lname']."','".$_SESSION['email']."','".$_SESSION['password']."','','','','','".$_SESSION['acno']."','".$_SESSION['bankname']."','".$_SESSION['accname']."','".$_SESSION['phone']."','','','','".$_SESSION['acctype']."')" ;
			  if ($conn->query($sql) === TRUE) {
            	$conn->close();
             }
         }
		}

	header("Location:index.php");
?>
