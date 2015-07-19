<?php

function update_stolen_status($update_data) {
	$updated_stolen_status = $update_data['stolen_status'];
	//echo  $updated_stolen_status;
	$vehicle_number = $update_data['vehicle_number'];
	//echo $vehicle_number;
	mysql_query("UPDATE `vehicle` SET `stolen_status` = '$updated_stolen_status' WHERE `vehicle_number` = '$vehicle_number'");
}

function register_vehicle($register_data) {
	array_walk($register_data, 'array_sanitize');

	$fields = '`' . implode('`, `', array_keys($register_data)) .  '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';

	mysql_query("INSERT INTO `vehicle` ($fields) VALUES ($data)");
}

function update_owner_id($register_data, $user_id) {
	$vehicle_number = $register_data['vehicle_number'];
	//$a = strval($user_id);
	mysql_query("UPDATE `vehicle` SET `vehicle_owner_id` = $user_id WHERE `vehicle_number` = '{$vehicle_number}'");
	// mysql_query("UPDATE `vehicle` SET `vehicle_owner_id` = '{$a}' WHERE `vehicle_number` = " . "'" . "{$vehicle_number}" ."'");
	//echo "   UPDATE `vehicle` SET `vehicle_owner_id` = $a WHERE `vehicle_number` = " . "'" . "{$vehicle_number}" ."'";
}	

function update_no_of_vehicles($user_id) {   
	$data1 = array();
	$data1 = mysql_fetch_assoc(mysql_query("SELECT `no_of_vehicles` FROM `user` WHERE `user_id` = $user_id"));
	$data1['no_of_vehicles'] = $data1['no_of_vehicles']+1;
	$data2 = $data1['no_of_vehicles'];
	mysql_query("UPDATE `user` SET `no_of_vehicles` = $data2 WHERE `user_id` = $user_id");
}	


function vehicle_exists($vehicle_number) {
	$vehicle_number = sanitize($vehicle_number);
	$query = mysql_query("SELECT COUNT(`vehicle_number`) FROM `vehicle` WHERE `vehicle_number` = '$vehicle_number'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function change_password($user_id, $password) {
	$user_id = (int)$user_id;
	$password = md5($password);

	mysql_query("UPDATE `tb` SET `password` = '$password' WHERE `user_id` = $user_id");
}

function register_user($register_data) {
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);

	$fields = '`' . implode('`, `', array_keys($register_data)) .  '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';

	mysql_query("INSERT INTO `user` ($fields) VALUES ($data)");
}

function user_count() {
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `active` = 1"), 0);
}

function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if ($func_num_args > 1) {
		unset($func_get_args[0]);

		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `tb` WHERE `user_id` = $user_id"));

		return $data;
	}
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `police_login` WHERE `username` = '$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function email_exists($email) {
	$email = sanitize($email);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `email` = '$email'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function mobile_exists($mobile) {
	$mobile = sanitize($mobile);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `mobile` = '$mobile'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_active($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `username` = '$username' AND `active` = 1");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_id_from_username($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT `user_id` FROM `police_login` WHERE `username` = '$username'");
	return (mysql_result($query, 0, 'user_id'));
}

function login($username, $password) {
	$user_id = user_id_from_username($username);

	$username = sanitize($username);
	$password = md5($password);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `police_login` WHERE `username` = '$username' AND `password` = '$password'");
	return (mysql_result($query, 0) == 1) ? $user_id : false;
}

function balance($vehicle_number, $user_data) {
	$data1 = array();
	$data1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `vehicle` WHERE `vehicle_number` = '$vehicle_number'"));
	$vehicle_owner_id = $data1['vehicle_owner_id'];
	$vehicle_type = $data1['vehicle_type'];
	$tb_user_id = $user_data['user_id'];
	$data2 = array();
	$data2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `tb` WHERE `user_id` = '$tb_user_id'"));
	$tb_owner_id = $data2['toll_booth_owner_id'];
	$cost = $data2[$vehicle_type];
	$data3 = array();
	$data3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `user` WHERE `user_id` = '$vehicle_owner_id'"));
	$vehicle_owner_balance = $data3['balance'];
	if($vehicle_owner_balance<$cost){
		return false;
	}else {
		$data4 = array();
		$data4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `tb_owner` WHERE `user_id` = '$tb_owner_id'"));
		$tb_owner_balance = $data4['balance'];
		$new_vehicle_owner_balance = $vehicle_owner_balance-$cost;
		mysql_query("UPDATE `user` SET `balance` = $new_vehicle_owner_balance WHERE `user_id` = $vehicle_owner_id");
		$new_tb_owner_balance = $tb_owner_balance+$cost;
		mysql_query("UPDATE `tb_owner` SET `balance` = $new_tb_owner_balance WHERE `user_id` = $tb_owner_id");
		return true;
	}
}

function stolen_alert($vehicle_number, $user_data) {
	$data1 = array();
	$data1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `vehicle` WHERE `vehicle_number` = '$vehicle_number'"));
	if($data1['stolen_status'] == 'stolen') {
		$vehicle_owner_id = $data1['vehicle_owner_id'];
		$vehicle_type = $data1['vehicle_type'];
		$tb_user_id = $user_data['user_id'];
		$data2 = array();
		$data2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `tb` WHERE `user_id` = '$tb_user_id'"));
		$tb = $data2['username'];
		$tb_nh = $data2['nh'];
		$tb_pincode = $data2['pincode'];
		$tb_police_station_id = $data2['toll_booth_police_id'];
		$data3 = array();
		$data3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `user` WHERE `user_id` = '$vehicle_owner_id'"));
		$vehicle_owner_name = $data3['name'];
		$vehicle_owner_mobile = $data3['mobile'];
		$vehicle_owner_email = $data3['email'];
		date_default_timezone_set("Asia/Kolkata");
		$date = date('Y-m-d');
		$time = date('H:i:s');
		mysql_query("INSERT INTO `police` (`police_station_id`, `vehicle_number`, `vehicle_type`, `owner_name`, `owner_mobile`, `owner_email`, `tb`, `tb_nh`, `tb_pincode`, `date`, `time`) VALUES ('$tb_police_station_id', '$vehicle_number', '$vehicle_type', '$vehicle_owner_name', '$vehicle_owner_mobile', '$vehicle_owner_email', '$tb', '$tb_nh', '$tb_pincode', '$date', '$time')");
	}
}

function user_detail($vehicle_number, $user_data) {
	$data1 = array();
	$data1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `vehicle` WHERE `vehicle_number` = '$vehicle_number'"));
	$vehicle_owner_id = $data1['vehicle_owner_id'];
	$vehicle_type = $data1['vehicle_type'];
	$tb_user_id = $user_data['user_id'];
	$data2 = array();
	$data2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `tb` WHERE `user_id` = '$tb_user_id'"));
	$tb = $data2['username'];
	$tb_nh = $data2['nh'];
	$tb_pincode = $data2['pincode'];
	$cost = $data2[$vehicle_type];
	$data3 = array();
	$data3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `user` WHERE `user_id` = '$vehicle_owner_id'"));
	$vehicle_owner_balance = $data3['balance'];
	date_default_timezone_set("Asia/Kolkata");
	$date = date('Y-m-d');
	$time = date('H:i:s');
	mysql_query("INSERT INTO `user_detail` (`user_id`, `tb`, `tb_nh`, `tb_pincode`, `cost`, `updated_balance`, `date`, `time`) VALUES ('$vehicle_owner_id', '$tb', '$tb_nh', '$tb_pincode', '$cost', '$vehicle_owner_balance', '$date', '$time')");
}

function tb_owner_detail($vehicle_number, $user_data) {
	$data1 = array();
	$data1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `vehicle` WHERE `vehicle_number` = '$vehicle_number'"));
	$vehicle_type = $data1['vehicle_type'];
	$tb_user_id = $user_data['user_id'];
	$data2 = array();
	$data2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `tb` WHERE `user_id` = '$tb_user_id'"));
	$tb_owner_id = $data2['toll_booth_owner_id'];
	$earning = $data2[$vehicle_type];
	$tb = $data2['username'];
	$tb_nh = $data2['nh'];
	$tb_pincode = $data2['pincode'];
	$data3 = array();
	$data3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `tb_owner` WHERE `user_id` = '$tb_owner_id'"));
	$tb_owner_balance = $data3['balance'];
	date_default_timezone_set("Asia/Kolkata");
	$date = date('Y-m-d');
	$time = date('H:i:s');
	mysql_query("INSERT INTO `tb_owner_detail` (`tb_owner_id`, `tb`, `tb_nh`, `tb_pincode`, `earning`, `updated_balance`, `date`, `time`) VALUES ('$tb_owner_id', '$tb', '$tb_nh', '$tb_pincode', '$earning', '$tb_owner_balance', '$date', '$time')");
}

?>