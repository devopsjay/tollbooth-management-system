<?php
include 'core/init.php'; 
include 'includes/overall/header_loggedin.php';

if (empty($_POST) === false) {
	$amount = $_POST['amount']; 
	$mode = $_POST['card'];
	$bank = $_POST['bank'];
	if (empty($amount) === true) {
		$errors[] = 'Enter the amount to be charged.';
	} if ($bank == 'none') {
		$errors[] = 'Choose a bank.';
	}
}

if ((empty($errors) === true)&&(empty($_POST) === false)) {
	if (preg_match("/\\s/", $_POST['amount']) == true) {
			$errors[] = 'Amount must not contain any spaces.';
	}if (strlen($_POST['amount']) > 5) {
			$errors[] = 'Amount must be less than 5 digits long.';
	}if (!preg_match("/^[0-9]*$/",$_POST['amount'])) {
 		 	$errors[] = 'Amount should only contain digits.';
	}
}
?>

<?php
if (empty($errors) === false){
			echo output_errors($errors);
		} else {
			$amount = $_POST['amount']; 
			$mode = $_POST['card'];
			$bank = $_POST['bank'];
			$page = $bank . $mode;
			echo $page;
			echo $amount;
			if ($page == 'sbidebitcard')
			header("Location: sbidebitcard.php?amount=$amount");
			else if ($page == 'canaradebitcard')
			header("Location: canaradebitcard.php?amount=$amount");
			else if ($page == 'icicidebitcard')
			header("Location: icicidebitcard.php?amount=$amount");
			else if ($page == 'iobdebitcard')
			header("Location: iobdebitcard.php?amount=$amount");
			else if ($page == 'axisdebitcard')
			header("Location: axisdebitcard.php?amount=$amount");
			else if ($page == 'hdfcdebittcard')
			header("Location: hdfcdebitcard.php?amount=$amount");
			else if ($page == 'boidebittcard')
			header("Location: boidebitcard.php?amount=$amount");
			else if ($page == 'idbidebittcard')
			header("Location: idbidebitcard.php?amount=$amount");
	}
?>


<?php include 'includes/overall/footer.php'; ?>