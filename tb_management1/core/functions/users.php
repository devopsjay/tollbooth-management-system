<?php

function update_stolen_status($update_data) {
	$updated_stolen_status = $update_data['stolen_status'];
	$vehicle_number = $update_data['vehicle_number'];
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

	mysql_query("UPDATE `user` SET `password` = '$password' WHERE `user_id` = $user_id");
}

function change_password_tb_owner($user_id, $password) {
	$user_id = (int)$user_id;
	$password = md5($password);

	mysql_query("UPDATE `tb_owner` SET `password` = '$password' WHERE `user_id` = $user_id");
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
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `user` WHERE `user_id` = $user_id"));

		return $data;
	}
}

function user_data_tb_owner($user_id) {
	$data = array();
	$user_id = (int)$user_id;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if ($func_num_args > 1) {
		unset($func_get_args[0]);

		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `tb_owner` WHERE `user_id` = $user_id"));

		return $data;
	}
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function logged_in_tb_owner() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `username` = '$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_exists_tb_owner($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `tb_owner` WHERE `username` = '$username'");
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
	$query = mysql_query("SELECT `user_id` FROM `user` WHERE `username` = '$username'");
	return (mysql_result($query, 0, 'user_id'));
}

function user_id_from_username_tb_owner($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT `user_id` FROM `tb_owner` WHERE `username` = '$username'");
	return (mysql_result($query, 0, 'user_id'));
}

function login($username, $password) {
	$user_id = user_id_from_username($username);

	$username = sanitize($username);
	$password = md5($password);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `username` = '$username' AND `password` = '$password'");
	return (mysql_result($query, 0) == 1) ? $user_id : false;
}

function login_tb_owner($username, $password) {
	$user_id = user_id_from_username_tb_owner($username);

	$username = sanitize($username);
	$password = md5($password);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `tb_owner` WHERE `username` = '$username' AND `password` = '$password'");
	return (mysql_result($query, 0) == 1) ? $user_id : false;
}

function user_balance_update($user_id, $amount) {
	$data1 = array();
	$data1 = mysql_fetch_assoc(mysql_query("SELECT `balance` FROM `user` WHERE `user_id` = $user_id"));
	$balance = $data1['balance'];
	$new_balance = $balance+$amount;
	mysql_query("UPDATE `user` SET `balance` = $new_balance WHERE `user_id` = $user_id");
}

?>