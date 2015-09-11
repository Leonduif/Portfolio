<?php 
	require 'functions.php';
	require 'work.php';

	// If email form has been submitted
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$emailFrom = trim(htmlspecialchars($_POST['email']));
		$subject   = trim(htmlspecialchars($_POST['subject']));
		$message   = trim(htmlspecialchars($_POST['message']));
		$emailTo   = "postmaster@leonduif.com";

		$headers = 'From: ' . $emailFrom . "\r\n" .
		    'Reply-To: ' . $emailTo . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		// Send if it's valid
		if (valid_email($emailFrom) && strlen($emailFrom) > 0 && strlen($subject) > 0 && strlen($message)) {
			mail($emailTo, $subject, $message, $headers);
		}
		else {
			echo "Something went wrong, please try again.";
		}
	}
?>