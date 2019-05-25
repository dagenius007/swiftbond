<?php
session_start();
if ($_SESSION['package'] != "") {
	header("Location:index.php");
	exit;
}
if (isset($_GET['package']) && isset($_SESSION['email']) && isset($_SESSION['fname']) && $_SESSION['package'] == "") {
	require('connectdb.ext');
	if ($_GET['package'] == "5k") {
		$p = "5k";
		$pt = "a";
	} else if ($_GET['package'] == "10k") {
		$p = "10k";
		$pt = "b";
	} else if ($_GET['package'] == "20k") {
		$p = "20k";
		$pt = "c";
	} else {
		header("Location:selectPackage.php");
		exit;
	}


	$sql = "UPDATE `users` SET `package`='" . $p . "' WHERE `email` = '" . $_SESSION['email'] . "'";

	if ($conn->query($sql) === TRUE) {
		$_SESSION['package'] = $p;

		//Upline Retrieval
		/*
    		require('connectdb.ext');
    		$sql = 'SELECT * FROM `users` WHERE `package` = "'.$p.'" and `bankname` != "" and (`dpay1` = "" or `dpay2` = "")';
    		$result = $conn->query($sql);



			if ($result->num_rows > 0) {

				$row = $result->fetch_assoc();
					$conn->close();


					require('connectdb.ext');

					if ($row['dpay1']=="") {
						$sql = "UPDATE `users` SET `dpay1`='".$_SESSION['email']."' WHERE `email` = '".$row['email']."'" ;

						if ($conn->query($sql) === TRUE) {
							//do nothing
						}

					}
					else if ($row['dpay2']=="") {
						$sql = "UPDATE `users` SET `dpay2`='".$_SESSION['email']."' WHERE `email` = '".$row['email']."'" ;
						if ($conn->query($sql) === TRUE) {
						//do nothing
						}

					}

					$conn->close();

					require('connectdb.ext');
					$sql = "UPDATE `users` SET `upay`='".$row['email']."' WHERE `email` = '".$_SESSION['email']."'" ;

						if ($conn->query($sql) === TRUE) {
							$conn->close();
						}

				}

				else{
					//..do nothing
				 }



    		header("Location:settings.php?n=pkgscss&p=".$pt);

    */
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	header("Location:settings.php?n=pkgscss&p=" . $pt);
	$conn->close();
} else {
	header("Location:selectPackage.php");
	exit;
}
