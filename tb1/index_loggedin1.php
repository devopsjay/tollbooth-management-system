<?php
include 'core/init.php'; 
include 'includes/overall/header_loggedin.php'; 
include 'mail_config.php';
include 'mailFunctions.php';

if (empty($_POST) === false) {
	$vehicle_number = $_POST['vehicle_number'];
	if (empty($vehicle_number) === true) {
		$errors[] = 'Enter Vehicle number';
	}
}

if ((empty($errors) === true)&&(empty($_POST) === false)) {
	if (preg_match("/\\s/", $_POST['vehicle_number']) == true) {
			$errors[] = 'Vehicle_number must not contain any spaces.';
	}if (strlen($_POST['vehicle_number']) < 10) {
			$errors[] = 'Vehicle number must be atleast 10 letters long.';
	}if (!preg_match("/^[0-9A-Z]*$/",$_POST['vehicle_number'])) {
 		 	$errors[] = 'Wrong Vehicle Number format.';
	}
}
?>


<?php
if (empty($_POST) === false && empty($errors) === true) {
	$vehicle_number = $_POST['vehicle_number'];
	$vehicle_exists = vehicle_exists($vehicle_number);
	if ($vehicle_exists === false) {
		$errors[] = 'Vehicle not registered. Bill Manually!!!';
		} else {
			stolen_alert($vehicle_number, $user_data);
			$balance = balance($vehicle_number, $user_data);
			if ($balance === false) {
			$errors[] = 'Balance low. Bill Manually!!!';
			}else {
			$errors[] = 'Vehicle billed successfully!';
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
			/*echo output_errors($errors);*/
			$error_all = output_errors($errors);
			echo "<script type='text/javascript'>alert('$error_all');</script>";
		}
?>


<!-- &nbsp;<h2>Toll Booth - </h2>
 <form action="" method="post">
			<ul id="login">
				<li>
					Vehicle Number:<br>
					<input type="text" name="vehicle_number">
				</li>
				<li>
					<input type="submit" value="Submit">
				</li>
			</ul>
		</form>  -->


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
                            <!-- Start first slide -->
                            
                             <div id="wrap">
                                <div id="regbar1">
                                  <div id="navthing1">
                                    
                                    <h5>TOLLBOOTH - <?php echo $user_data['username'];  ?> </h5>
                                    </div>
                                    <form action="" method="post">
                                    <div class="user_login">
                                      <div class="arrow-up"></div>
                                      <div class="formholder">
                                        <div class="randompad">
                                           <fieldset>
                                             <h6>Vehicle Number</h6>
                                             <input type="text" name="vehicle_number" />
                                             <!-- <h6>Password</h6>
                                             <input type="password" value="" /> -->
                                             <input type="submit" value="Submit" />
                                           </fieldset>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </form>
                                    <script src="js/jlibrary1.js"></script>
                                    <script src="js/index1.js"></script>
                              </div>
                            <!-- End cSlide navigation arrows -->
                        </div>
                    </div>
                </div> 

<?php include 'includes/overall/footer.php'; ?>
		