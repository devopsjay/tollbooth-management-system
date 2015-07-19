<?php
include 'core/init_tb_owner.php'; 
protected_page_tb_owner();

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
include 'includes/overall/header_tb_owner.php'; 
?>
<h1>Change Password</h1>

<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Your password has been changed.';
} else {
if (empty($_POST) === false && empty($errors) === true) {
	change_password_tb_owner($session_user_id, $_POST['password']);
	header('Location: changepassword_tb_owner.php?success');
} else if (empty($errors) === false){
		echo output_errors($errors);
		}
?>


<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/stylemain_tb.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <link rel="stylesheet" type="text/css" href="css/style1_change_password.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider_tb.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head>
    
    <body>
        <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <a href="#" class="brand">
                                <img src="images/logo.png" width="120" height="40" alt="Logo" />
                                <!-- This is website logo -->
                            </a>
                            <!-- Navigation button, visible on small resolution -->
                            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <i class="icon-menu"></i>
                            </button>
                            <!-- Main navigation -->
                            <div class="nav-collapse collapse pull-right">
                                <ul class="nav" id="top-navigation">
                                    <li class="active"><a href="#home">Home</a></li>
                                    <li><a href="#service">Services</a></li>
                                    <li><a href="#portfolio">Portfolio</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#clients">Clients</a></li>
                                    <li><a href="#price">Price</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>
                            </div>
                            <!-- End main navigation -->
                        </div>
                    </div>
        </div>
                <!-- Start home section -->
        <div id="home">
                    <!-- Start cSlider -->
                    <div id="da-slider" class="da-slider">
                        <!-- <div class="triangle"></div> -->
                        <!-- mask elemet use for masking background image -->
                        <div class="mask"></div>
                        <!-- All slides centred in container element -->
                        <div class="container">
                            <div class="logout2">
                                <p><a href="#" id="logout2">Log Out<a></p>
                            </div>
                            <!-- Start first slide -->
                            
                             <div id="wrap">
                                <div id="regbar1">
                                  <div id="navthing1">
                                    
                                    <h5>CHANGE PASSWORD</h5>
                                    </div>
                                    <div class="user_login">
                                      <div class="arrow-up"></div>
                                      <div class="formholder">
                                        <div class="randompad">
                                           <fieldset>
                                             <h6>Existing Password</h6>
                                             <input type="password" value="" />
                                             <h6>New Password</h6>
                                             <input type="password" value="" />
                                             <h6>Confirm New Password</h6>
                                             <input type="password" value="" />
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
        <div class="footer">
            <p>&copy; 2015 All Rights Reserved</p>
        </div>
        </body>
</html>               

<?php
}
include 'includes/overall/footer.php'; ?>	