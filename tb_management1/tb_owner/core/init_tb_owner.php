<?php
session_start();
//error_reporting(0);

require 'core/database/connect.php';
require 'core/functions/general.php';
require 'core/functions/users.php';

if (logged_in_tb_owner() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data_tb_owner($session_user_id, 'user_id', 'username', 'password', 'name', 'email', 'mobile', 'balance');

}

$errors = array();
?>