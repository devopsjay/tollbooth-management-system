<!DOCTYPE html>
<html>
   <head>
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
      </style>
   </head>
<body>

<?php
$cars = array
   (
   array("Volvo",22,18),
   array("BMW",15,13),
   array("Saab",5,2),
   array("Land Rover",17,15)
   );
   print_r($cars);
   
for ($row = 0; $row <  4; $row++) {
   echo "<p><b>Row number $row</b></p>";
   echo "<table>";
   echo "<tr>";
   for ($col = 0; $col <  3; $col++) {
     echo "<th>".$cars[$row][$col]."</th>";
   }
   echo "</tr>";
   echo "</table>";
}
?>

</body>
</html>