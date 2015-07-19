<?php
	include 'core/init_tb_owner.php'; 

	$url1=$_SERVER['REQUEST_URI'];
	 
	header("Refresh: 15; URL=$url1");
	 
	
		$user_id = $user_data['user_id'];
		$user_id = (string)$user_id;
		$query = mysql_query("SELECT COUNT(`tb_owner_id`) FROM `tb_owner_detail` WHERE `tb_owner_id` = '$user_id'");
		$row1 = mysql_fetch_array($query, MYSQL_NUM);
		$r = $row1[0];
		$products = array();

		$count = 0;

		while ($row1[0] != 0) {
			if($count == 0) {
				//echo "<script type='text/javascript'>alert('Stolen Vehicle');</script>";
				$products1 = array();
				$products1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `tb_owner_detail` WHERE `tb_owner_id` = '$user_id'"));
				//echo "sdfsd";
				//print_r($products1);
				$date = $products1['date'];
				$time = $products1['time'];
				$row1[0]--;
				$count++;
				array_push($products, $products1); 
			} else {
				//echo "<script type='text/javascript'>alert('Stolen Vehicle');</script>";
				$products1 = array();
				$products1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `tb_owner_detail` WHERE `tb_owner_id` = '$user_id' AND (`date` > '$date' OR `time` > '$time')"));
				//echo "dfsdfsdfsdsdfsdf";
				//print_r($products1);
				$date = $products1['date'];
				$time = $products1['time'];
				$row1[0]--;
				array_push($products, $products1); 
			}
			 
		}

		$c = array("tb", "tb_nh", "tb_pincode", "earning", "updated_balance", "date", "time");

	   echo "<table id='product_table'>";

	   echo "<th>Toll Booth</th><th>Toll Booth NH</th><th>Toll Booth Pincode</th><th>Earning</th><th>Current Balance</th><th>Date</th><th>Time</th>";
	for ($row = 0; $row <  $r; $row++) {
	   	if ($row % 2 == 0) {
	   		echo "<tr class='alt'>";
	   	} else {
	   		echo "<tr>";
	   	}
	   for ($col = 0; $col <  7; $col++) {
		   	if ($col == 8) {
			     // Do Nothing
			     // echo "<td class='alt'>" . $products[$row][$c[$col]] . "</td>";
		   	} else {
			     echo "<td>" . $products[$row][$c[$col]] . "</td>";
		   	}
	   }
	   echo "</tr>";
	}
	   echo "</table>";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Demo</title>
		<style type="text/css">
/*		#product_table
		{
			border: 1px solid gray;
			border-collapse: collapse;
		}
		#product_table td,th
		{
			border:1px solid gray;
		}
		.head_table
		{
			background-color: :black;
			color:white;
		}
		.row_even
		{
			background-color: :#ccff00;
		}
		.row_odd
		{
			background-color: :#ff7700;
		}*/

		#product_table {
		    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		    width: 100%;
		    border-collapse: collapse;
		}

		#product_table td, #product_table th {
		    font-size: 1em;
		    border: 1px solid #98bf21;
		    padding: 3px 7px 2px 7px;
		}

		#product_table th {
		    font-size: 1.1em;
		    text-align: left;
		    padding-top: 5px;
		    padding-bottom: 4px;
		    background-color: #A7C942;
		    color: #ffffff;
		}

		#product_table tr.alt td {
		    color: #000000;
		    background-color: #EAF2D3;
		}
	</head>
	<body>
	</body>
</html>
