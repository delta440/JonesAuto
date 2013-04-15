<html><head><title>Find Customers With Late Payments</title></head></html>

<?php
if(isset($_POST['submit'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$MinLatePayments = $_POST['minlatepayments'];
$query = "SELECT *
		FROM Customer
		Where TaxPayerID in (SELECT TaxPayerID
							FROM Payments
							WHERE DueDate < DatePaid
							GROUP BY TaxPayerID
							HAVING COUNT(TaxPayerID) >= '$MinLatePayments')";
echo "<html><body>";
echo "<h2>List of the Customers : </h2>";  
echo "<table border='1' style='border-collapse: collapse;border-color: silver;'>";  
echo "<tr style='font-weight: bold;'>";  
echo "<td width='200' align='center'>Customer First Name</td><td width='200'align='center'>Customer Last Name</td><td width='200' align='center'>Gender</td><td width='200' align='center'>Phone Number</td><td width='200' align='center'>City</td><td width='200' align='center'>State</td><td width='200' align='center'>Zip</td><td width='200' align='center'>TaxPayerID</td>";  
echo "</tr>";  
$result = mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
while($row = mysql_fetch_array($result)){
	echo "<tr>";  
	echo "<td align='center' width='200'>" . $row['FirstName'] . "</td>";  
	echo "<td align='center' width='200'>" . $row['LastName'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['Gender'] . "</td>";
	echo "<td align='center' width='100'>" . $row['PhoneNumber'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['City'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['State'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['Zip'] . "</td>";  
	echo "<td align='center' width='100'>" . $row['TaxPayerID'] . "</td>";  
	echo "</tr>";  

	}

}
?>


<html><body>
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Minimum # of Late Payments: <input name ="minlatepayments" type = "number"/><br />
<input name = "submit" type = "submit" value = "Submit"/><br />
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>