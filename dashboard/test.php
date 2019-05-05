<?php
    		require('connectdb.ext');
    		$sql = 'SELECT * FROM `users` WHERE `bankname` != "" and (`dpay1` = "" or `dpay2` = "" or `dpay3` = "")';
    		$result = $conn->query($sql);

			

			if ($result->num_rows > 0) {

				$row = $result->fetch_assoc();
					echo $row['email'];
					echo $row['Firstname'];
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
					else if ($row['dpay3']=="") {
						$sql = "UPDATE `users` SET `dpay3`='".$_SESSION['email']."' WHERE `email` = '".$row['email']."'" ;
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
				 ?>