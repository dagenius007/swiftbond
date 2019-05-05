<?php
	require('../includes/auth.php');
	if (isset($_GET['p'])) {
		require('../includes/connection.php');
echo $_SESSION['email'];
if($_GET['p']=="5,000"){
            	$sql = "UPDATE `register` set `package` = '5,000' WHERE `email` = '".$_SESSION['email']."'" ;
            	 if ($conn->query($sql) === TRUE) {
            	 	$conn->close();            
            	 		 }
            }
           elseif($_GET['p']=="10,000"){
           	require('../includes/connection.php');
            	$sql = "UPDATE `register` set `package` = '10,000' WHERE `email` = '".$_SESSION['email']."'" ;
            	 if ($conn->query($sql) === TRUE) {
            	 	$conn->close();            
            	 		 }
            }
           elseif($_GET['p']=="20,000"){
           	require('../includes/connection.php');
            	$sql = "UPDATE `register` set `package` = '20,000' WHERE `email` = '".$_SESSION['email']."'" ;
            	 if ($conn->query($sql) === TRUE) {
            	 	$conn->close();            
            	 		 }
            }
            else{
           header("selectpackage.php");
           exit;
            }
            header("location:index.php");
	}
	else{
		header("location:selectpackage.php");
	}