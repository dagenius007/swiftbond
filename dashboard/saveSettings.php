<?php
session_start();
if($_SESSION['package']==""){
	header("Location:index.php");
	exit;
}

if($_POST['phone']==""){
			echo 'ppp';
			exit;
		}

	if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['fname']) && isset($_POST['bankname'])) {
		
		if($_POST['password']== $_SESSION['password'])
		{

		
		}
		
		else if ($_POST['password'] != $_POST['password2']) {
						echo "Mismatch";
						exit;
					}
					else if ($_POST['password'] == $_POST['password2']) {
						require('connectdb.ext');

						$sql = "UPDATE `users` SET `password`='".$_POST['password']."' WHERE `email` = '".$_SESSION['email']."'";
						if ($conn->query($sql) === TRUE) {
    							
    							echo 'Saved';
    
							} 
					}
			
			require('connectdb.ext');
			$sql = "UPDATE `users` SET `Firstname`='".$_POST['fname']."',`Lastname`='".$_POST['lname']."',`phone`='".$_POST['phone']."',`bankname`='".$_POST['bankname']."',`acctype`='".$_POST['acctype']."',`acno`='".$_POST['accno']."',`accname`='".$_POST['accname']."' WHERE `email` = '".$_SESSION['email']."'";


			if ($conn->query($sql) === TRUE) {
    		
    			echo "All done";
    
			} 

			else {
   				 echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
		}
		else{
			//header("Location:settings.php");
			exit;
		}

		
		
		
	
?>