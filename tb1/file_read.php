
<?php
include 'core/init.php'; 
include 'includes/overall/header_loggedin.php'; 

$fh = fopen('vehicle_number.txt','r');
while ($line = fgets($fh)) {
	$vehicle_number = trim($line);
	if (empty($vehicle_number) === false) {
	mysql_query("INSERT INTO `rfid` (`vehicle_number`) VALUES ('$vehicle_number')");
	echo $vehicle_number;
}
  	//echo $line;
}
fclose($fh);
?>

<?php include 'includes/overall/footer.php'; ?>