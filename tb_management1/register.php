<?php
include 'core/init.php'; 
logged_in_redirect();
include 'includes/overall/header_register.php';

if (empty($_POST) === false) {
	$required_fields = array('username', 'password', 'password_again', 'name', 'mobile', 'email');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}
}

	if ((empty($errors) === true)&&(empty($_POST) === false))  {
		$mob="/^[789][0-9]{9}$/";
		if(!preg_match($mob, $_POST['mobile'])) { 
    		$errors[] = 'Mobile number can only have numbers.';
		} 
		else if (user_exists($_POST['username']) === true) {
			$errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken.';
		}
		else if (preg_match("/\\s/", $_POST['username']) == true) {
			$errors[] = 'Your username must not contain any spaces.';
		}
		else if (strlen($_POST['password']) < 6) {
			$errors[] = 'Your password must be atleast 6 characters.';
		}
		else if (trim($_POST['password']) !== trim($_POST['password_again'])) {
			$errors[] = 'Your passwords do not match.';
		}
		else if (preg_match("/\\s/", $_POST['mobile']) == true) {
			$errors[] = 'Your mobile number must not contain any spaces.';
		}
		else if (strlen($_POST['mobile']) < 10) {
			$errors[] = 'Your mobile number must be atleast 10 digits long.';
		}
		else if (mobile_exists($_POST['mobile']) === true) {
			$errors[] = 'Sorry, the mobile \'' . $_POST['mobile'] . '\' is already in use.';
		}
		else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'A valid email address is required';
		}
		else if (email_exists($_POST['email']) === true) {
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use.';
		}
} 

?>

<?php
/*if (isset($_GET['success']) && empty($_GET['success'])) {
	echo nl2br("You\'ve been registered successfully!\n\nAn activation link has been sent to your registered e-mail.");
	echo "<script type='text/javascript'>alert('You\'ve been registered successfully!\n\nAn activation link has been sent to your registered e-mail.');</script>";
} else */
 	if (empty($_POST) === false && empty($errors) === true) {
		$register_data = array(
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'name'	   => $_POST['name'],
			'mobile'   => $_POST['mobile'],
			'email'    => $_POST['email']
			);
		register_user($register_data);
		header('Location: login.php');
		exit();

	} else if (empty($errors) === false){
		/*echo output_errors($errors);*/
		$error_all = output_errors($errors);
		echo "<script type='text/javascript'>alert('$error_all');</script>";
}
?>

<!-- <form action="" method="post">
	<ul>
		<li>
			Username*:<br>
			<input type="text" name="username">
		</li>
		<li>
			Password*:<br>
			<input type="password" name="password">
		</li>
		<li>
			Password again*:<br>
			<input type="password" name="password_again">
		</li>
		<li>
			Name*:<br>
			<input type="text" name="name">
		</li>
		<li>
			Mobile*:<br>
			<input type="text" name="mobile" maxlength="10">
		</li>
		<li>
			Email*:<br>
			<input type="text" name="email">
		</li>
		<li>
			<input type="submit" value="Register">
		</li>
	</ul>
</form>
 -->


 <div id="home">
                    <!-- Start cSlider -->
                    <div id="da-slider" class="da-slider">
                        <!-- <div class="triangle"></div> -->
                        <!-- mask elemet use for masking background image -->
                        <div class="mask"></div>
                        <!-- All slides centred in container element -->
                        <div class="container">
                            <!-- Start first slide -->
                            
                             <div id="wrap">
                                <div id="regbar1">
                                  <div id="navthing1">
                                    
                                    <h5>REGISTER</h5>
                                    </div>
                                    <div class="user_login">
                                      <div class="arrow-up"></div>
                                      <div class="formholder">
                                        <div class="randompad">
                                           <fieldset>
                                           	 <form action="" method="post">
                                             <h6>Name*</h6>
                                             <input type="text" name="name" />
                                              <h6>Email ID*</h6>
                                             <input type="text" name="email" />
                                             <h6>Mobile*</h6>
                                             <input type="text" name="mobile" maxlength="10" />
                                             <h6>Username*</h6>
                                             <input type="text" name="username" />
                                             <h6>Password*</h6>
                                             <input type="password" name="password" />
                                             <h6>Password Again*</h6>
                                             <input type="password" name="password_again" />
                                             <input type="submit" value="Register" />
                                               </form>
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
<?php 
include 'includes/overall/footer.php'; ?>	