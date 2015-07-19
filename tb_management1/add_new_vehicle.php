<?php
include 'core/init.php'; 
include 'includes/overall/header_add_new_vehicle.php'; 


if (empty($_POST) === false) {
	$required_fields = array('vehicle_number', 'vehicle_type', 'stolen_status');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}
}


if ((empty($errors) === true)&&(empty($_POST) === false)) {
		if (vehicle_exists($_POST['vehicle_number']) === true) {
			$errors[] = 'Sorry, the vehicle_number \'' . $_POST['vehicle_number'] . '\' already exists.';
		}
		else if (preg_match("/\\s/", $_POST['vehicle_number']) == true) {
			$errors[] = 'Your vehicle_number must not contain any spaces.';
		}
		else if (strlen($_POST['vehicle_number']) < 10) {
			$errors[] = 'Your vehicle number must be atleast 10 letters long.';
		}
		else if (!preg_match("/^[0-9A-Z]*$/",$_POST['vehicle_number'])) {
 		 	$errors[] = 'Wrong Vehicle Number format.';
		}
	}
?>

<?php
if (empty($_POST) === false && empty($errors) === true) {
	$register_data = array(
		'vehicle_number' 	=> $_POST['vehicle_number'],
		'vehicle_type' 		=> $_POST['vehicle_type'],
		'stolen_status'	    => $_POST['stolen_status']
		);
	register_vehicle($register_data);
	$user_id = $user_data['user_id'];
	update_owner_id($register_data, $user_id);
	update_no_of_vehicles($user_id);
	/*echo "Vehicle registered successfully!";*/
	echo "<script type='text/javascript'>alert('Vehicle registered successfully!');</script>";

	} else if (empty($errors) === false){
		/*echo output_errors($errors);*/
		$error_all = output_errors($errors);
		echo "<script type='text/javascript'>alert('$error_all');</script>";
}
?>


<!-- <form action="" method="post">
	<ul>
		<li>
			<br>&nbsp;&nbsp;&nbsp;&nbsp;Vehilcle Number*:<br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="vehicle_number">
		</li>
		<li>
			<br>&nbsp;&nbsp;&nbsp;&nbsp;Vehicle Type*:<br>
			&nbsp;&nbsp;&nbsp;&nbsp;<select name="vehicle_type">
  			<option value="two_wheeler">Two Wheeler</option>
  			<option value="three/four_wheeler">Three/Four Wheeler</option>
  			<option value="heavy_vehicle">Heavy Vehicle</option>
			</select>
		</li>
		<li>
			<br>&nbsp;&nbsp;&nbsp;&nbsp;Stolen Status*:<br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="stolen_status" value="not_stolen" checked>Not Stolen
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="stolen_status" value="stolen">Stolen
		</li>
		<li>
			<br>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit">
		</li>
	</ul>
</form> -->

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
                            <!-- Start first slide -->
                            
                             <div id="wrap">
                                <div id="regbar1">
                                  <div id="navthing1">
                                    
                                    <h5>ADD A NEW VEHICLE</h5>
                                    </div>
                                    <form action="" method="post">
                                    <div class="user_login">
                                      <div class="arrow-up"></div>
                                      <div class="formholder">
                                        <div class="randompad">
                                           <fieldset>
                                             <h6>Vehicle Number</h6>
                                             <input type="text" name="vehicle_number" />
                                             <!-- <div class="vehicle"> -->
                                             <h6>Vehicle Type</h6>
                                             <select name="vehicle_type">
                                                 <option value="two_wheeler">Two Wheeler</option>
                                                 <option value="three/four_wheeler">Three/Four Wheeler</option>
                                                 <option value="heavy_vehicle">Heavy Vehicle</option>
                                             </select>
                                             <!-- </div> -->
                                             <h6>Stolen Status</h6>
<!--                                              <div class="status1">
                                                <input type="radio" name="stolen_status" value="not_stolen"><p>Not Stolen</p>
                                             </div> -->
                                             <div class="status1">   
                                                <input type="radio" name="stolen_status" value="not_stolen"><p>Not Stolen</p>
                                             </div>
                                             <div class="status2">   
                                                <input type="radio" name="stolen_status" value="stolen"><p>Stolen</p>
                                             </div>

                                             <input type="submit" value="Submit" />
                                           </fieldset>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                    <script src="js/jlibrary1.js"></script>
                                    <script src="js/index1.js"></script>
                              </div>
                            <!-- End cSlide navigation arrows -->
                        </div>
                    </div>
                </div> 

<?php include 'includes/overall/footer.php'; ?>