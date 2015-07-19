<?php

function change_password_tb_owner($user_id, $password) {
	$user_id = (int)$user_id;
	$password = md5($password);

	mysql_query("UPDATE `tb_owner` SET `password` = '$password' WHERE `user_id` = $user_id");
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

function logged_in_tb_owner() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists_tb_owner($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `tb_owner` WHERE `username` = '$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_id_from_username_tb_owner($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT `user_id` FROM `tb_owner` WHERE `username` = '$username'");
	return (mysql_result($query, 0, 'user_id'));
}

function login_tb_owner($username, $password) {
	$user_id = user_id_from_username_tb_owner($username);

	$username = sanitize($username);
	$password = md5($password);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `tb_owner` WHERE `username` = '$username' AND `password` = '$password'");
	return (mysql_result($query, 0) == 1) ? $user_id : false;
}

?>