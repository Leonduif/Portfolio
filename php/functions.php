<?php 
	function valid_email($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	// If form has been submitted and something went wrong it will save the value
	function isOld($input) {
		if (isset($_POST[$input])) {
			echo $_POST[$input];
		}
	}
?>