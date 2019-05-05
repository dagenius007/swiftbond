<?php
	require('auth.php');
	if ($_GET['rdr']==md5(md5("3e7a5abf659d1c90b2760d830ca67ba1")) && isset($_GET['du'])) {
		require('connectdb.ext');

		if ($_GET['du']=="dpay1") {
			$sql = "DELETE FROM `users` WHERE `email` = '".$_SESSION['dpay1']."'" ;
            if ($conn->query($sql) === TRUE) {
            	$conn->close();
            	require('connectdb.ext');
            	$sql = "UPDATE `users` SET `dpay1v`='' WHERE `email` = '".$_SESSION['email']."'" ;
            	 if ($conn->query($sql) === TRUE) {
            	 	$conn->close();
            	 	require('connectdb.ext');
            	$sql = "UPDATE `users` SET `dpay1`='' WHERE `email` = '".$_SESSION['email']."'" ;
            	 if ($conn->query($sql) === TRUE) {
            	 	$conn->close();

            		}
            	 }
            }

		}
		else if ($_GET['du']=="dpay2") {
			$sql = "DELETE FROM `users` WHERE `email` = '".$_SESSION['dpay2']."'" ;
            if ($conn->query($sql) === TRUE) {
            	$conn->close();
            	require('connectdb.ext');
            	$sql = "UPDATE `users` SET `dpay2v`='' WHERE `email` = '".$_SESSION['email']."'" ;
            	 if ($conn->query($sql) === TRUE) {
            	 	$conn->close();
            	 	require('connectdb.ext');
            	$sql = "UPDATE `users` SET `dpay2`='' WHERE `email` = '".$_SESSION['email']."'" ;
            	 if ($conn->query($sql) === TRUE) {
            	 	$conn->close();

            		}
            	 }
            }
		}
		header('Location:index.php');

	}
	else
	{
		header('Location:index.php');
	}

?>
