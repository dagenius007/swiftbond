<?php
require('auth.php');
if ($_GET['rdr'] == md5("3e7a5abf659d1c90b2760d830ca67ba1") && isset($_GET['du'])) {
	require('connectdb.ext');

	if ($_GET['du'] == "dpay1") {
		$sql = "UPDATE `users` SET `upayv`='11' WHERE `email` = '" . $_SESSION['dpay1'] . "'";
		if ($conn->query($sql) === TRUE) {
			$conn->close();
			require('connectdb.ext');
			$sql = "UPDATE `users` SET `dpay1v`='11' WHERE `email` = '" . $_SESSION['email'] . "'";
			if ($conn->query($sql) === TRUE) {
				# do nothing
			}
		}
	} else if ($_GET['du'] == "dpay2") {

		$sql = "UPDATE `users` SET `upayv`='11' WHERE `email` = '" . $_SESSION['dpay2'] . "'";
		if ($conn->query($sql) === TRUE) {
			$conn->close();
			require('connectdb.ext');
			$sql = "UPDATE `users` SET `dpay2v`='11' WHERE `email` = '" . $_SESSION['email'] . "'";
			if ($conn->query($sql) === TRUE) {
				# do nothing
			}
		}
	} else if ($_GET['du'] == "dpay3") {

		$sql = "UPDATE `users` SET `upayv`='11' WHERE `email` = '" . $_SESSION['dpay3'] . "'";
		if ($conn->query($sql) === TRUE) {
			$conn->close();
			require('connectdb.ext');
			$sql = "UPDATE `users` SET `dpay3v`='11' WHERE `email` = '" . $_SESSION['email'] . "'";
			if ($conn->query($sql) === TRUE) {
				# do nothing
			}
		}
	}else if ($_GET['du'] == "dpay4") {

		$sql = "UPDATE `users` SET `upayv`='11' WHERE `email` = '" . $_SESSION['dpay4'] . "'";
		if ($conn->query($sql) === TRUE) {
			$conn->close();
			require('connectdb.ext');
			$sql = "UPDATE `users` SET `dpay4v`='11' WHERE `email` = '" . $_SESSION['email'] . "'";
			if ($conn->query($sql) === TRUE) {
				# do nothing
			}
		}
	}
	$conn->close();
	header('Location:index.php');
} else {
	header('Location:index.php');
}
