<html><head><title>Search For Customer</title></head>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
You can search by first name, last name, or both. You can also leave both blank to display all customers. <br />
FirstName: <input name = "firstname" type = "text"/><br />
LastName: <input name = "lastname" type = "text"/><br />
<input name = "search" type = "submit" value = "Search"/><br />
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>

<?php
if(isset($_POST['search'])){
echo "<html><body>";
echo "<h2>List of the Customers : </h2>";  
echo "<table border='1' style='border-collapse: collapse;border-color: silver;'>";  
echo "<tr style='font-weight: bold;'>";  
echo "<td width='200' align='center'>Customer First Name</td><td width='200'align='center'>Customer Last Name</td><td width='200' align='center'>Gender</td><td width='200' align='center'>Phone Number</td><td width='200' align='center'>City</td><td width='200' align='center'>State</td><td width='200' align='center'>Zip</td><td width='200' align='center'>TaxPayerID</td>";  
echo "</tr>";  

include('sqlconnect.php');
mysql_query("USE jonesauto");
$FirstName = $_POST['firstname'];
$LastName = $_POST['lastname'];
if($FirstName == "" && $LastName != "")
	$query = "SELECT * FROM customer WHERE LastName = '$LastName'";
if($FirstName != "" && $LastName == "")
	$query = "SELECT * FROM customer WHERE FirstName = '$FirstName'";
if($FirstName != "" && $LastName != "")
	$query = "SELECT * FROM customer WHERE LastName = '$LastName' AND FirstName = '$FirstName'";
if($FirstName == "" && $LastName == "")
	$query = "SELECT * FROM customer";
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