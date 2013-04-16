<html><head><title>Check Inventory</title></head></html>
<?php/*Project 3660 
 Due: 2013 April 18
 Creators: Jay, Chris, Robert
 Name: checkinventory.php
 Objective: to display a table with the vehicles that are in stock*/
?>
<?php
include('sqlconnect.php');
mysql_query("USE jonesauto");
echo "<html><body>";
echo "<h2>List of The Vehicles On Lot: </h2>";  
echo "<table border='1' style='border-collapse: collapse;border-color: silver;'>";  
echo "<tr style='font-weight: bold;'>";  
echo "<td width='200' align='center'>VIN</td><td width='200'align='center'>Make</td><td width='200' align='center'>Model</td><td width='200' align='center'>Color</td><td width='200' align='center'>Color</td><td width='200' align='center'>Miles</td><td width='200' align='center'>BookPrice</td><td width='600' align='center'>CarCondition</td>";  
echo "</tr>";  

$query = "SELECT *
		FROM Vehicle
		Where VIN NOT IN (SELECT VIN
							FROM Sold)";
$result = mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
while($row = mysql_fetch_array($result)){
	echo "<tr>";  
	echo "<td align='center' width='100'>" . $row['VIN'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['Make'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['Model'] . "</td>";
	echo "<td align='center' width='100'>" . $row['Color'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['Miles'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['InteriorColor'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['BookPrice'] . "</td>";  
	echo "<td align='center' width='600'>" . $row['CarCondition'] . "</td>";  
	echo "</tr>";  

	}
?>