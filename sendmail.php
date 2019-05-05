<?php
	require "class.phpmailer.php";
	
	 if(isset($_POST['send'])){
	
	$to = "support@fortunebuilders.com.ng";
	$message = "
              You just got contacted by : $_POST['Name']  \n
              Sent from email : $_POST['Email'] \n
              Subject : $_POST['Subject'] \n
              Message: $_POST['Message']

          ";
	$from ='contact@fortunebuilders.com.ng';
            $from_name = 'Contact me alert';

            $mail = new PHPMailer();  // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true;  // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = 'mail.fortunebuilders.com.ng';
            $mail->Port = 465;
            $mail->Username = 'contact@fortunebuilders.com.ng';
            $mail->Password = 'Computer421$';
            $mail->SetFrom($from, $from_name);
            $mail->Subject = $_POST['subject'];
            $mail->Body = $message;
            $mail->AddAddress($to);
            $mail->Send();
            echo '<p style="text-align:center;font-family:Segoe UI, Calibri, sans-serif; color:#02ce30">Message sent!</p>';
            echo "<script type=\"text/javascript\">
    		 window.open(\"index.php\",'_self')
     		</script>
  		";
  		}
	    
?>
