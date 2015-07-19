<?php
	 
	$url1=$_SERVER['REQUEST_URI'];
	 
	header("Refresh: 15; URL=$url1");
	 
?>

<?php
include 'core/init.php'; 
include 'includes/overall/header_loggedin.php'; 

$user_id = $user_data['user_id'];
$user_id = (string)$user_id;
$query = mysql_query("SELECT COUNT(`vehicle_number`) FROM `police` WHERE `police_station_id` = '$user_id'");
/*while ($row = mysql_fetch_array($query, MYSQL_NUM)) {
	printf("%s", $row[0]);
	echo $row[0];
}*/
$row = mysql_fetch_array($query, MYSQL_NUM);
//echo $row[0];
$count = 0;
while ($row[0] != 0) {
	if($count == 0) {
		echo "<script type='text/javascript'>alert('Stolen Vehicle');</script>";
		$data = array();
		$data = mysql_fetch_assoc(mysql_query("SELECT * FROM `police` WHERE `police_station_id` = '$user_id'"));
		//print_r($data);
		$vehicle_number = $data['vehicle_number'];
		$row[0]--;
		$count++;
	} else {
		echo "<script type='text/javascript'>alert('Stolen Vehicle');</script>";
		$data = array();
		$data = mysql_fetch_assoc(mysql_query("SELECT * FROM `police` WHERE `police_station_id` = '$user_id' AND `vehicle_number` > '$vehicle_number'"));
		//print_r($data);
		$vehicle_number = $data['vehicle_number'];
		$row[0]--;
	}
	 
}

?>
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
                            <div class="change_password2">
                                <h1><a href="changepassword.php" id="ch_password2">Change Password<a></h1>
                                <!-- <h2><a href="#" id="details">Edit Details<a></h2> -->
                            </div>

                         </div>
                     </div>
               </div>


<?php include 'includes/overall/footer.php'; ?>
		