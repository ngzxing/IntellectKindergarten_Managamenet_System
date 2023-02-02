<?php

session_start();
include "dbconnect.php";

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

        if( isset($_SESSION["pIC"]) ){

            $queryPassword = "SELECT * FROM parent WHERE pIC = '$_SESSION[pIC]' ";
            $resultPassword = mysqli_query($con, $queryPassword);
		    $password = mysqli_fetch_array($resultPassword)["pPassword"];


        }elseif( isset($_SESSION["tIC"]) ){

            $queryPassword = "SELECT * FROM teacher WHERE tIC = '$_SESSION[tIC]' ";
            $resultPassword = mysqli_query($con, $queryPassword);
		    $password = mysqli_fetch_array($resultPassword)["tPassword"];
        }
        else{

            header("location:login.php");
        }
        

		if( !password_verify($_POST["password"], $password )  ){

			mysqli_close($con);
			$_SESSION["reset_sending_state"] = 0;
			header('location: reset.php');

		}
        else{

			if( isset($_SESSION["pIC"]) ){

				$_SESSION["forget_who"] = "parent";

                $queryEmail = "SELECT * FROM Parent WHERE pIC = '$_SESSION[pIC]' ";
                $resultEmail = mysqli_query($con, $queryEmail);
                $email = mysqli_fetch_array($resultEmail)["pEmail"];

			}
			else{

				$_SESSION["forget_who"] = "teacher";

                $queryEmail = "SELECT * FROM Teacher WHERE tIC = '$_SESSION[tIC]' ";
                $resultEmail = mysqli_query($con, $queryEmail);
                $email = mysqli_fetch_array($resultEmail)["tEmail"];
			}
			

			$_SESSION["forget_email"] = $email;

            $token = generateString();

	        $queryInsert = "INSERT token VALUES( '$email','$token', DATE_ADD(NOW(), INTERVAL 5 MINUTE) ) ";
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

	        $mail->addAddress($email);
	        $mail->Send();
			$mail->smtpClose();
			
			mysqli_close($con);
			$_SESSION["reset_sending_state"] = 1;
			header('location: reset.php');
			
        }

?>