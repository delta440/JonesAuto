<http><head><title>View Top Salesmen</title></head></http>

<html><body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Start Date: <input name = "startdate" type = "date"/><br />
End Date: <input name = "enddate" type = "date"/><br />
<input name = "search" type = "submit" value = "Search"/><br />
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>


<?php
if(isset($_POST['search'])){
echo "<html><body>";
echo "<h2>List of the Employies sorted by sales : </h2>";  
echo "<table border='1' style='border-collapse: collapse;border-color: silver;'>";  
echo "<tr style='font-weight: bold;'>";  
echo "<td width='50' align='center'>EmployeeID</td><td width='200'align='center'>FirstName</td><td width='200' align='center'>LastName</td><td width='200' align='center'>Phone Number</td><td width='200' align='center'>Sales</td>";  
echo "</tr>";  

include('sqlconnect.php');
mysql_query("USE jonesauto");
$StartDate = $_POST['startdate'];
$EndDate = $_POST['enddate'];

$query = "SELECT e.EmployeeID, e.PhoneNumber, e.FirstName, e.LastName, SUM(s.TotalDue)as sales
		FROM Employee as e, Sold as s
		Where e.EmployeeID = s.EmployeeID AND s.DateOfSale BETWEEN '$StartDate' 
		AND '$EndDate'
		GROUP BY e.EmployeeID
		ORDER BY sales DESC";
$result = mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
while($row = mysql_fetch_array($result)){
	echo "<tr>";  
	echo "<td align='center' width='200'>" . $row['EmployeeID'] . "</td>";  
	echo "<td align='center' width='200'>" . $row['FirstName'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['LastName'] . "</td>";
	echo "<td align='center' width='100'>" . $row['PhoneNumber'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['sales'] . "</td>";  
	echo "</tr>";
	}
}

?>