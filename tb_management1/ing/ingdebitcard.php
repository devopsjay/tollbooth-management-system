<?php
include 'core/init.php'; 
include '../mail_config.php';
include '../mailFunctions.php';

if (empty($_POST) === false) {
	$card_no = $_POST['card_number']; 
	$name = $_POST['name'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$cvv = $_POST['cvv'];
	if (empty($card_no) === true) {
		$errors[] = 'Enter the Card Number.';
	} else if (empty($name) === true) {
		$errors[] = 'Enter the Name on the Card.';
	} else if (empty($month) === true) {
		$errors[] = 'Enter the expiry month given on the Card .';
	} else if (empty($year) === true) {
		$errors[] = 'Enter the expiry year given on the Card.';
	} else if (empty($cvv) === true) {
		$errors[] = 'Enter the CVV Number given on the Card.';
}
}

if ((empty($errors) === true)&&(empty($_POST) === false)) {
	if (preg_match("/\\s/", $_POST['card_number']) == true) {
			$errors[] = 'Invalid Card Number.';
	} else if (preg_match("/\\s/", $_POST['month']) == true) {
			$errors[] = 'Invalid Expiry Date.';
	} elseif (preg_match("/\\s/", $_POST['year']) == true) {
			$errors[] = 'Invalid Expiry Date.';
	} else if (preg_match("/\\s/", $_POST['cvv']) == true) {
			$errors[] = 'Invalid CVV Number.';
	} else if (strlen($_POST['card_number']) !== 16) {
			$errors[] = 'Invalid Card Number.';
	} else if (strlen($_POST['month']) !== 2) {
			$errors[] = 'Invalid Expiry Date.';
	} else if (strlen($_POST['year']) !== 4) {
			$errors[] = 'Invalid Expiry Date.';
	}else if (strlen($_POST['cvv']) !== 3) {
			$errors[] = 'Invalid CVV Number.';
	}else if (!preg_match("/^[0-9]*$/",$_POST['card_number'])) {
 		 	$errors[] = 'Invalid Card Number.';
	}/*else if (!preg_match("/^[A-Z ]*$/",$_POST['name'])) {
 		 	$errors[] = 'Name should only contain capital letters.';
 	}*/else if (!preg_match("/^[0-9]*$/",$_POST['month'])) {
 		 	$errors[] = 'Invalid Expiry Date.';
 	}else if (!preg_match("/^[0-9]*$/",$_POST['year'])) {
 		 	$errors[] = 'Invalid Expiry Date.';
 	}else if (!preg_match("/^[0-9]*$/",$_POST['cvv'])) {
 		 	$errors[] = 'Invalid CVV Number.';
 	}
 	date_default_timezone_set("Asia/Kolkata");
 	$month = $_POST['month'];
 	$month_int = (int)$month;
	$year = $_POST['year'];
	$year_int = (int)$year;
	$year_now = date('Y');
	$month_now = date('m');
	if(($year_int == $year_now) && ($month_int<$month_now)){
		$errors[] = 'Invalid Expiry Date.';
	} /*else {
		if ($month_int < $month_now) {
			$errors[] = 'Invalid Expiry Date.';
	}

}*/
}

?>

<?php
if ((empty($_POST) === false) && (empty($errors) === true)) {
	$amount = $_GET['amount'];
	$user_id = $user_data['user_id'];
	$user_email = $user_data['email'];
	$new_balance = user_balance_update($user_id, $amount);
	//echo "Mail sent";
	date_default_timezone_set("Asia/Kolkata");
	$date = date('Y-m-d');
	$time = date('H:i:s');
	$email = $user_email;
	$body = "Recharge of Rs. ". $amount . " done on " . $date . " at " . $time. ". New Balance is " . $new_balance . ".";
	$sub = "Recharge";
	$bool = sendMail( $email, $body, $sub);
	//echo $bool;
	header('Location: succeful_payment.php');
	} else if((empty($_POST) === false) && (empty($errors) === false)) {
		/*echo output_errors($errors);*/	
		$error_all = output_errors($errors);
		echo "<script type='text/javascript'>alert('$error_all');</script>";
	}
?>







<html>

<head>
	<link rel="stylesheet" href="ing.css">
	<script type="text/javascript" src="lvilas.js"></script>
</head>

<body>
  <div class="flex">
	  <div id="laksmi">
		 
		 <div id="header">
		 </div>
		
		<div id="form">
					<form name="debit" onsubmit="return Debit_card();" action="" method="POST">
						<p id="card_no" class="box">
						<label for="Atmno">
						<span>
						Card number:
						</span>
						</label>
						<input name="card_number" value="" maxlength="16" size="24"placeholder="XXXX XXXX XXXX XXXX"  type="text">
						</p>


						<p id="person_name">
							<label for="person">
								<span>
									Name on card:
								</span>
								<input name="name" maxlength="20" size="30" type="text" value="">
							</label>
						</p>
						
						<div id="errorBox">
						</div>
						
						<p id="bankdate">
							<label>
								<span>
									 Expiry Date:
								</span>
							</label>
									

							<select name="year">
									  <option value="" selected="selected" disabled>Year</option>
									  <option value="2015">15</option>
									  <option  value="2016">16</option>
									  <option value="2017">17</option>
									  <option value="2018">18</option>
									  <option value="2019">19</option>
									  <option value="2020">20</option>
									  <option value="2021">21</option>
									  <option value="2022">22</option>
									  <option value="2023">23</option>
									  <option value="2024">24</option>
							</select>
							&nbsp;&nbsp;		
							
							<select name="month">
									  <option value="" selected="selected" disabled>Month</option>
									  <option value="01">Jan</option>
									  <option value="02">Feb</option>
									  <option value="03">Mar</option>
									  <option value="04">Apr</option>
									  <option value="05">May</option>
									  <option value="06">June</option>
									  <option value="07">July</option>
									  <option value="08">Augt</option>
									  <option value="09">Sept</option>
									  <option value="10">Oct</option>
									  <option value="11">Nov</option>
									  <option value="12">Dec</option>
							</select>
							  
								   
						</p>
							
						<p id="cvv">
							<label>
								<span>
									cvv:
								</span>
								<input name="cvv" maxlength="3" type="password" value="" >
							</label>
						</p>
							   
						<div id="bttn">
							<button onClick="Debit_card()">Submit</button>
						</div>	   
					</form>
		</div>
    
		<div id="header">
		</div>

     </div>

  </div>


</body>

</html>