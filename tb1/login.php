<?php
include 'core/init.php';  
logged_in_redirect();

if (empty($_POST) === false) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'You need to enter a username and password';
	} else if (user_exists($username) === false) {
		$errors[] = 'We cannott find that username. Try again!!';
	} 
	else {

		if (strlen($password) > 32) {
			$errors[] = 'Password too long';
		}

		
		$login = login($username, $password);
		if($login === false) {
			$errors[] = 'That username/password combination is incorrect';
		} else {
			$_SESSION['user_id'] = $login;
			header('Location: index_loggedin.php');
			exit();
		}
	}
} else {
	$errors[] = 'No data recieved';
}
include 'includes/overall/header.php';
include 'includes/overall/body.php';
if ((empty($errors) === false) && (empty($_POST) === false)) {
?>
	<!-- <h2>We tried to log you in, but...</h2> -->
<?php
	/*echo output_errors($errors);*/
	if ((empty($errors) === false) && (empty($_POST) === false)){
			/*echo output_errors($errors);*/
			$error_all = output_errors($errors);
			echo "<script type='text/javascript'>alert('$error_all');</script>";
		}
}
include 'includes/overall/footer.php';
?>