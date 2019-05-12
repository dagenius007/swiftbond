<?php
require('connectdb.ext');

$sql = 'SELECT * FROM `users` where 1';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$rowa = $result->fetch_assoc();
	require('connectdb.ext');

	$sql = "INSERT INTO `confirmed` (`email`,`package`) values('" . $rowa['email'] . "','" . $rowa['package'] . "')";
	if ($conn->query($sql) === TRUE) {
		$conn->close();
	}
}
while ($row = $result->fetch_assoc()) {
	require('connectdb.ext');

	$sql = "INSERT INTO `confirmed` (`email`,`package`) values('" . $row['email'] . "','" . $row['package'] . "')";
	if ($conn->query($sql) === TRUE) {
		$conn->close();
	}
}
