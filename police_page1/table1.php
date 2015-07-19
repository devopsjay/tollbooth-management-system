<?php
	 
	$url1=$_SERVER['REQUEST_URI'];
	 
	header("Refresh: 15; URL=$url1");
	 
?>


<?php
	include 'core/init.php'; 

	function get_products()
	{
		$user_id = $user_data['user_id'];
		$user_id = (string)$user_id;
		$query = mysql_query("SELECT COUNT(`vehicle_number`) FROM `police` WHERE `police_station_id` = '$user_id'");
		$row = mysql_fetch_array($query, MYSQL_NUM);

		$count = 0;
		while ($row[0] != 0) {
			if($count == 0) {
				echo "<script type='text/javascript'>alert('Stolen Vehicle');</script>";
				$data = array();
				$data = mysql_fetch_assoc(mysql_query("SELECT * FROM `police` WHERE `police_station_id` = '$user_id'"));
				print_r($data);
				$vehicle_number = $data['vehicle_number'];
				$row[0]--;
				$count++;
			} else {
				echo "<script type='text/javascript'>alert('Stolen Vehicle');</script>";
				$data = array();
				$data = mysql_fetch_assoc(mysql_query("SELECT * FROM `police` WHERE `police_station_id` = '$user_id' AND `vehicle_number` > '$vehicle_number'"));
				print_r($data);
				$vehicle_number = $data['vehicle_number'];
				$row[0]--;
			}
			 
		}
		/*$query="select * from products";
		$data=mysql_query($query,$conn);

		$products=array();

		while($object=mysql_fetch_object($data))
		{
			$products[]=$object;
		}
		mysql_close($conn);*/
		return $data;
	}

	function get_table()
	{
		//create table
		$table_str='<table id="product_table">';
		$products=get_products();
		$i=1;
		$table_str.='<tr>';
		$table_str.='<th>Sr No.</th><th>Vehicle Number</th><th>P.S I.D</th><th>Vehicle Type</th><th>Owner Name</th><th>Owner Mobile</th><th>Owner Email</th><th>Toll Booth</th><th>Toll Booth NH</th><th>Toll Booth Pincode</th><th>Date</th><th>Time</th>' ;
		$table_str.='</tr>';
		foreach($products as $product)
		{
			$class='';
			if($i%2==0)
			{
				$class='row_even';
			}
			else
			{
				$class='row_odd';
			}
			$table_str.='<tr class="'.$class.'">';
			$table_str.='<td width="30">'.($i++).'</td><td>'.$product->vehicle_number.'</td><td>'.$product->police_station_id.'</td><td>'.$product->vehicle_type.'</td><td>'.$product->owner_name.'</td><td>'.$product->owner_mobile.'</td><td>'.$product->owner_email.'</td><td>'.$product->tb.'</td><td>'.$product->tb_nh.'</td><td>'.$product->tb_pincode.'</td><td>'.$product->date.'</td><td>'.$product->time.'</td>';
			$table_str.='</tr>';
		}
		$table_str.='</table>'
		return $table_str;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Demo</title>
		<style type="text/css">
		#product_table
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
		}
	</head>
	<body>
		<?php echo get_table(); ?>
	</body>
</html>