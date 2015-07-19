<?php
include 'core/init_tb_owner.php';
logged_in_redirect_tb_owner();

if (empty($_POST) === false) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'You need to enter a username and password';
	} else if (user_exists_tb_owner($username) === false) {
		$errors[] = 'Sorry, We can\'t find that username. Try again!!';
	}
	else {

		if (strlen($password) > 32) {
			$errors[] = 'Password too long';
		}

		
		$login = login_tb_owner($username, $password);
		if($login === false) {
			$errors[] = 'That username/password combination is incorrect';
		} else {
			$_SESSION['user_id'] = $login;
			header('Location: user_home.php');
			exit();
		}
	}
} else {
	$errors[] = 'No data recieved';
}
include 'includes/overall/header_tb_owner.php';
if (empty($errors) === false) {
?>
	<h2>We tried to log you in, but...</h2>
<?php
	/*echo output_errors($errors);*/
	$error_all = output_errors($errors);
	echo "<script type='text/javascript'>alert('$error_all');</script>";
}
include 'includes/overall/footer.php';
?>