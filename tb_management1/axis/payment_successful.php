<?php
include 'core/init.php'; 
include 'includes/overall/header_loggedin.php';
?>

<!-- <h2>Payment Successful!!!</h2> -->
echo "<script type='text/javascript'>alert('Payment Successful!!!');</script>";

<a href="javascript: history.go(-2)">Make another recharge</a>