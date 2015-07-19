<?php
	 
	$url1=$_SERVER['REQUEST_URI'];
	 
	header("Refresh: 5; URL=$url1");
	 
?>

<form action=\"bookRoom.php\" method=\"post\" id=\"dateForm\">
    <input name=\"from\" type=\"hidden\" value=\"$fday/$fmonth/$fyear\">
    <input name=\"to\" type=\"hidden\" value=\"$tday/$tmonth/$tyear\">
    <input type=\"submit\">
   </form>

<script type="text/javascript">
    document.getElementById('dateForm').submit(); // SUBMIT FORM
</script>


