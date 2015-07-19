<?php
	
	function get_products()
	{
		$conn=mysql_connect('localhost','root','');
		if(!$conn)
		{
			die('cn't connect to server);
		}
		$db=mysql_select_db('examples',$conn);
		if(!$db)
		{
			die('cant connect to db');
		}
		$query="select * from products";
		$data=mysql_query($query,$conn);

		$products=array();

		while($object=mysql_fetch_object($data))
		{
			$products[]=$object;
		}
		mysql_close($conn);
		return $products;
	}
	function get_table()
	{
		//create table
		$table_str='<table id="product_table">';
		$products=get_products();
		$i=1;
		$table_str.='<tr>';
		$table_str.='<th>Sr No.</th></th>Name</th></th>Price</th>' ;
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
			$table_str.='<td width="30">'.($i++).'</td><td>'.$product->product_name.'</td><td>'.$product->product_price'</td>';
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