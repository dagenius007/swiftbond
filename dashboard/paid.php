<?php
	require('auth.php');
	if ($_GET['rdr']=="3e7a5abf659d1c90b2760d830ca67ba1") {
		require('connectdb.ext');
		 $sql = "UPDATE `users` SET `upay1v`='1' WHERE `email` = '".$_SESSION['email']."'" ;
            if ($conn->query($sql) === TRUE) {
            header('Location:index.php');
            }
		
	}
	elseif($_GET['rdr']=="3e7a5abf659d1c90b2760d830ca67ba2") {
		require('connectdb.ext');
		 $sql = "UPDATE `users` SET `upay2v`='1' WHERE `email` = '".$_SESSION['email']."'" ;
            if ($conn->query($sql) === TRUE) {
            header('Location:index.php');
            }
		
	}
	else {
		header('Location:index.php');
	}

?>