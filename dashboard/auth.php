<?php
session_start();
if (!isset($_SESSION['email'])) {
	header("Location:../");
	exit;
}
//GetAllData

require('connectdb.ext');
try {
	$sql = "SELECT * FROM `users` where `email` = '" . $_SESSION['email'] . "'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row

		while ($row = $result->fetch_assoc()) {

			$_SESSION['fname'] = $row['firstname'];
			$_SESSION['lname'] = $row['lastname'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['package'] = $row['package'];
			$_SESSION['plan'] = $row['plan'];
			$_SESSION['upay'] = $row['upay'];
			$_SESSION['dpay1'] = $row['dpay1'];
			$_SESSION['dpay2'] = $row['dpay2'];
			$_SESSION['dpay3'] = $row['dpay3'];
			$_SESSION['dpay1v'] = $row['dpay1v'];
			$_SESSION['dpay2v'] = $row['dpay2v'];
			$_SESSION['dpay3v'] = $row['dpay3v'];
			$_SESSION['upayv'] = $row['upayv'];
			$_SESSION['phone'] = $row['phone'];
			$_SESSION['acno'] = $row['acno'];
			$_SESSION['acctype'] = $row['acctype'];
			$_SESSION['bankname'] = $row['bankname'];
			$_SESSION['accname'] = $row['accname'];
		}
	}
} catch (PDOException $e) {
	session_destroy();
	session_unset();
	exit;
}
