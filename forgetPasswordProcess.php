<?php
   session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include ('dbconnect.php');
    require "PHPMailer-master/src/PHPMailer.php";
	require "PHPMailer-master/src/Exception.php"; 
	require 'PHPMailer-master/src/SMTP.php';

	function generateString($len = 10) {

			$token = "abcdefghijklmnopqrstuvwxyz1234567890";
			$token = str_shuffle($token);
			$token = substr($token, 0, $len);

			return $token;
	}

        $queryPEmail = "SELECT * FROM parent WHERE pEmail='$_POST[email]'";
        $resultPEmail = mysqli_query($con, $queryPEmail);
		$countPEmail = mysqli_num_rows($resultPEmail);

		$querytEmail = "SELECT * FROM teacher WHERE tEmail='$_POST[email]'";
        $resulttEmail = mysqli_query($con, $querytEmail);
		$counttEMail = mysqli_num_rows($resulttEmail);

		if( ($countPEmail + $counttEMail) == 0 ){

			mysqli_close($con);
			$_SESSION["forget_sending_state"] = 0;
			header('location: forgetPassword.php');

		}
        else{

			if($countPEmail != 0){

				$_SESSION["forget_who"] = "parent";
			}
			else{

				$_SESSION["forget_who"] = "teacher";
			}
			
			$_SESSION["forget_email"] = $_POST["email"];

            $token = generateString();

	        $queryInsert = "INSERT token VALUES( '$_POST[email]','$token', DATE_ADD(NOW(), INTERVAL 5 MINUTE) ) ";
			mysqli_query($con, $queryInsert);
			$link = "<a href='http://localhost/project/resetPassword.php?token=$token'>Click To Reset password</a>";

            $mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host = "smtp.gmail.com";
			$mail->isSMTP();   
		    $mail->SMTPOptions = array(
		      	  'ssl' => array(
		          'verify_peer' => false,
		          'verify_peer_name' => false,
		          'allow_self_signed' => true
			      )
			);
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "tls";
			$mail->Port = "587";

			
			$mail->Username = "ngxing116@gmail.com";
			$mail->Password = "wppkklqcqnjzoyib";
			$mail->Subject = "Reset Password";
			$mail->setFrom('ngxing116@gmail.com');
			$mail->isHTML(true);
			$mail->addAttachment('');
	        $mail->Body = "
	            Hi,<br>

	            Click On This Link to Reset Password
	            ".$link."<br><br>
	            The link will be valid for 5 minutes only.<br><br>
	            
	        ";

	        $mail->addAddress($_POST["email"]);
	        $mail->Send();
			$mail->smtpClose();
			
			mysqli_close($con);
			$_SESSION["forget_sending_state"] = 1;
			header('location: forgetPassword.php');
			
        }
		
?>