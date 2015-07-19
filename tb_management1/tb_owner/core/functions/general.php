<?php
function logged_in_redirect_tb_owner() {
	if (logged_in_tb_owner() === true) {
		header('Location: index_tb_owner.php');
		exit();
	}
}

function protected_page_tb_owner() {
	if (logged_in_tb_owner() === false) {
		header('Location: protected_tb_owner.php');
		exit();
	}
}

function array_sanitize(&$item) {
	$item = mysql_real_escape_string($item);
}

function sanitize($data) {
	return mysql_real_escape_string($data);
}

function output_errors($errors) {
	/*return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';*/
	return implode('</li><li>', $errors);
}
?>