<?php
include 'core/init.php'; 
include 'includes/overall/header_loggedin.php'; 
include 'mail_config.php';
include 'mailFunctions.php';

$url1=$_SERVER['REQUEST_URI']; 
header("Refresh: 15; URL=$url1");

$fh = fopen('vehicle_number.txt','r');
//echo "<span id ='vehicle_no'>";
//$count = 0;
//$first = "";

//if (!($line = fgets($fh))) {
	//echo "</span>";
//} else {
	while ($line = fgets($fh)) {

		$first = trim($line);
		//mysql_query("INSERT INTO `rfid` (`vehicle_number`) VALUES ('$vehicle_number')");
		//echo $vehicle_number;
		/*if (empty($vehicle_number) === false) {
			if ($count == 0) {
				$first = $vehicle_number;
				echo "</span>";
				$count++;
			}	
		}*/
	  	//echo $line;
	}
//}

fclose($fh);

?>

<?php
	// $vehicle_number = $first;
	$vehicle_number = $first;
	if (empty($vehicle_number) === true) {
		$errors[] = 'No Vehicle.';
	}

if ((empty($errors) === true)) {
	if (preg_match("/\\s/", $first) == true) {
			$errors[] = 'Vehicle_number must not contain any spaces.';
	}if (strlen($first) < 10) {
			$errors[] = 'Vehicle number must be atleast 10 letters long.';
	}if (!preg_match("/^[0-9A-Z]*$/", $first)) {
 		 	$errors[] = 'Wrong Vehicle Number format.';
	}
}
?>


<?php
if (empty($errors) === true) {
	$vehicle_number = $first;
	$vehicle_exists = vehicle_exists($vehicle_number);
	if ($vehicle_exists === false) {
		$errors[] = 'Vehicle Number ' . $vehicle_number . ' registered. Bill Manually!!!';
		} else {
			stolen_alert($vehicle_number, $user_data);
			$balance = balance($vehicle_number, $user_data);
			if ($balance === false) {
			$errors[] = 'Vehicle Number' . $vehicle_number . 'balance is low. Bill Manually!!!';
			$data1 = array();
			$data1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `vehicle` WHERE `vehicle_number` = '$vehicle_number'"));
			$vehicle_owner_id = $data1['vehicle_owner_id'];
			$data2 = array();
      		$data2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `user` WHERE `user_id` = '$vehicle_owner_id'"));
      		$email = $data2['email'];
      		$body = "Your Current Balance is " . $data2['balance'] . " which is low. Recharge Urgently." ;
      		$sub = "Toll Booth Transaction";
      		$bool = sendMail( $email, $body, $sub);
			}else {
			$errors[] = 'Vehicle Number ' . $vehicle_number . ' billed successfully!';
      		$data1 = array();
			tb_owner_detail($vehicle_number, $user_data);
			$data1 = user_detail($vehicle_number, $user_data);
      		$time = $data1['time'];
      		$date = $data1['date'];
      		$data2 = array();
      		$data2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `user_detail` WHERE `date` = '$date' AND `time` = '$time'"));
      		$email = $data2['email'];
      		$body = "Amount of Rs. ". $data2['cost'] . " deducted on " . $data2['date'] . " at " . $data2['time'] . " . Remaining Balance is " . $data2['updated_balance'] . ". Toll Booth Detail:" . " 1)Toll-Booth I.D : " . $data2['tb'] . " 2)National Highway : " . $data2['tb_nh'] . " 3)Pincode : " . $data2['tb_pincode'];
      		$sub = "Toll Booth Transaction";
      		$bool = sendMail( $email, $body, $sub);
			}
		}
	}if (empty($errors) === false){
			//echo output_errors($errors);
			$error_all = output_errors($errors);
			echo "<script type='text/javascript'>alert('$error_all');</script>";
		}

	$file = fopen("vehicle_number.txt","w");
	fwrite($file,"");
	fclose($file);
?>


&nbsp;<h2>Toll Booth - <?php echo $user_data['username'];  ?> </h2>
 ?>

 <div id="home"> 
                    <!-- Start cSlider -->
                    <div id="da-slider" class="da-slider">
                        <!-- <div class="triangle"></div> -->
                        <!-- mask elemet use for masking background image -->
                        <div class="mask"></div>
                        <!-- All slides centred in container element -->
                        <div class="container">
                        <div class="logout2">
                                <p><a href="logout.php" id="logout2">Log Out<a></p>
                            </div>
                            <div class="change_password2">
                                <h1><a href="changepassword.php" id="ch_password2">Change Password<a></h1>
                                <!-- <h2><a href="#" id="details">Edit Details<a></h2> -->
                            </div>
                         </div>
                    </div>
                </div> 


<?php include 'includes/overall/footer.php'; ?>



		