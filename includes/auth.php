<?php
session_start();
	if(!isset($_SESSION['email']))
	{
		header("Location:../");
		exit;
	}
	
	//GetAllData

	include('connection.php'); 
   try{
		$sql = "SELECT * FROM `register` where `email` = '".$_SESSION['email']."'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
  		
  		$row = $result->fetch_assoc();
   		    
           $_SESSION['fname'] = $row['firstname'];
           $_SESSION['lname'] = $row['lastname'];

           $_SESSION['password'] = $row['password'];
           $_SESSION['package'] = $row['package'];
           $_SESSION['upline'] = $row['upline'];
           $_SESSION['number'] = $row['number'];
           $_SESSION['acc_no'] = $row['acc_no'];
           $_SESSION['bank'] = $row['bank'];
           $_SESSION['acc_name'] = $row['acc_name'];
           $_SESSION['acctime']=$row["acctime"];
           
   			 
   		}
      else{
         $q1 = "select * from confirmed where email ='".$_SESSION['email']."'";

        $result =$conn->query($q1);
    if($result->num_rows > 0 ){

      $row = $result->fetch_assoc();
          
           $_SESSION['fname'] = $row['firstname'];
           $_SESSION['lname'] = $row['lastname'];

           $_SESSION['password'] = $row['password'];
           $_SESSION['package'] = $row['package'];
           $_SESSION['upline'] = $row['upline'];
           $_SESSION['number'] = $row['number'];
           $_SESSION['acc_no'] = $row['acc_no'];
           $_SESSION['bank'] = $row['bank'];
           $_SESSION['acc_name'] = $row['acc_name'];

           $_SESSION['downline1'] = $row['downline1'];
           $_SESSION['downline2'] = $row['downline2'];

           $_SESSION['ver_downline1'] = $row['ver_downline1'];
           $_SESSION['ver_downline2'] = $row['ver_downline2'];
           

         
   
  }
      }

    }
    catch(PDOException $e){
      session_destroy();
      session_unset();
      exit;
    }
?>