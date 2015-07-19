<?php
include 'core/init.php'; 
protected_page();

if (empty($_POST) === false) {
	$required_fields = array('current_password', 'password', 'password_again');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}

	if (md5($_POST['current_password']) === $user_data['password']) {
		if (trim($_POST['password']) !== trim($_POST['password_again'])) {
			$errors[] = 'Your new passwords do not match.';
		} else if (strlen($_POST['password']) < 6) {
			$errors[] = 'Your password must be atleast 6 characters.';
		}

	} else {
		$errors[] = 'Your current password is incorrect';
	}

}
include 'includes/overall/header_changepassword.php'; 
?>

<?php
/*if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Your password has been changed.';
} else {*/
if (empty($_POST) === false && empty($errors) === true) {
	change_password($session_user_id, $_POST['password']);
	header('Location: index_loggedin1.php');
} else if (empty($errors) === false){
		/*echo output_errors($errors);*/
		$error_all = output_errors($errors);
		echo "<script type='text/javascript'>alert('$error_all');</script>";
		}
?>


<!-- <form action="" method="post">
	<ul>
		<li>
			Current password*:<br>
			<input type="password" name="current_password">
		</li>
		<li>
			New password*:<br>
			<input type="password" name="password">
		</li>
		<li>
			New password again*:<br>
			<input type="password" name="password_again">
		</li>
		<li>
			<input type="submit" value="Change password">
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
                            <div class="logout2">
                                <p><a href="logout.php" id="logout2">Log Out<a></p>
                            </div>
                            <!-- Start first slide -->
                            
                             <div id="wrap">
                                <div id="regbar1">
                                  <div id="navthing1">
                                    
                                    <h5>CHANGE PASSWORD</h5>
                                    </div>
                                    <form action="" method="post">
                                    <div class="user_login">
                                      <div class="arrow-up"></div>
                                      <div class="formholder">
                                        <div class="randompad">
                                           <fieldset>
                                             <h6>Existing Password</h6>
                                             <input type="password" name="current_password" />
                                             <h6>New Password</h6>
                                             <input type="password" name="password" />
                                             <h6>Confirm New Password</h6>
                                             <input type="password" name="password_again" />
                                             <input type="submit" value="Change password" />
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

<?php
include 'includes/overall/footer.php'; ?>	