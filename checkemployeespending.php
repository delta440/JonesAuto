<html><head><title>Check Employee Spending</title></head></html>

<?php
if(isset($_POST['submit'])){

echo "<html><body>";
echo "<h2>List of the Employees and their spending : </h2>";  
echo "<table border='1' style='border-collapse: collapse;border-color: silver;'>";  
echo "<tr style='font-weight: bold;'>";  
echo "<td width='200' align='center'>EmployeeID</td><td width='200'align='center'>FirstName</td><td width='200' align='center'>LastName</td><td width='200' align='center'>PhoneNumber</td><td width='200' align='center'>TotalSpent</td>";  
echo "</tr>";  
include('sqlconnect.php');
mysql_query("USE jonesauto");
$EndDate = $_POST['enddate'];
$StartDate = $_POST['startdate'];
$query = "SELECT e.EmployeeID, e.PhoneNumber, e.FirstName, e.LastName, SUM(pfd.PricePaid)as sprice
		FROM Employee as e, PurchasedForDealership as pfd
		WHERE pfd.DateOfPurchase BETWEEN '$StartDate' AND '$EndDate'
		AND e.EmployeeID = pfd.EmployeeID
		GROUP BY e.EmployeeID";
$result = mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
while($row = mysql_fetch_array($result)){
	echo "<tr>";  
	echo "<td align='center' width='100'>" . $row['EmployeeID'] . "</td>";
	echo "<td align='center' width='200'>" . $row['FirstName'] . "</td>";  
	echo "<td align='center' width='200'>" . $row['LastName'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['PhoneNumber'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['sprice'] . "</td>";  
	echo "</tr>";  
	}
echo "</body></html>";
}
?>


<html><body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Start Date: <input name = "startdate" type = "date"/><br />
End Date: <input name = "enddate" type = "date"/><br />
<input name = "submit" type = "submit" value = "Submit"/><br />
</form>
<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>