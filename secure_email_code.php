<?php
if(isset($_POST["submit"])){
	
	// Checking For Blank Fields..
	if($_POST["fullname"]==""||$_POST["email"]==""||$_POST["sub"]==""||$_POST["msg"]==""){
		
		echo "Fill All Fields..";
		
	}else{
		
		// Check if the "Sender's Email" input field is filled out
		$email=$_POST['email'];
		// Sanitize E-mail Address
		$email =filter_var($email, FILTER_SANITIZE_EMAIL);
		// Validate E-mail Address
		$email= filter_var($email, FILTER_VALIDATE_EMAIL);
		
		if (!$email){
			
			echo "Invalid Sender's Email";
			
		} else{
			
			$subject = $_POST['sub'];
			$message = $_POST['msg'];
			$headers = 'From:'. $email2 . "rn"; // Sender's Email
			$headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender
			// Message lines should not exceed 70 characters (PHP rule), so wrap it
			$message = wordwrap($message, 70);
			// Send Mail By PHP Mail Function
			mail("fra.delgiu16@gmail.com", $subject, $message, $headers);
			echo "Your mail has been sent successfuly !";
			
		}
	}
}

?>