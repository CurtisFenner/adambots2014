<?php
	//This page receives messages from Contact Us and mails them to a small list of people.
	//This list should probably be drawn from somewhere more easily editable...
	error_reporting(E_NOTICE);
		function valid_email($str)
		{
			return filter_var($str,FILTER_VALIDATE_EMAIL);
			//return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
		}
		if($_POST['name']!='' && $_POST['email']!='' && valid_email($_POST['email'])==TRUE && strlen($_POST['comment'])>1)
		{//drumrs@aol.com
			$to = "drumrs@aol.com,nfenneremail@gmail.com,cfenneremail@gmail.com,njchoco@yahoo.com,joewiththeglasses@gmail.com";
			$headers =  'From: noreply@adambots.com\r\n' .
				'Reply-To: '.$_POST['email'].'' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
			$subject = "AdamBots.com 'Contact Us' - Message from \"" . $_POST['email'] . '"';
			$message = htmlspecialchars($_POST['name'] . " says:\n" . $_POST['comment'] . "\n\nPlease send reply to: " . $_POST['email']);
			if(mail($to, $subject, $message, $headers))
			{
				echo 1; //SUCCESS
			}
			else {
				echo 2; //FAILURE - server failure
			}
		}
		else {
			echo 3; //FAILURE - not valid email
		}
?>