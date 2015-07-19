<?php
include 'core/init.php'; 
include 'includes/overall/header.php'; 


	 if (logged_in() === true) {
	 	include 'includes/widgets/loggedin.php';
	 } else {
		include 'includes/widgets/login.php';
	}
	
include 'includes/overall/footer.php';
?>

