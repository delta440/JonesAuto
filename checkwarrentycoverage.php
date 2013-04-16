<html><head><title>Check Warrenty Coverage</title></head></html>
<?php/*Project 3660 
 Due: 2013 April 18
 Creators: Jay, Chris, Robert
 Name: checkwarrentycoverage.php
 Objective: To check if a customer's vehicle has warrenty coverage, and display the deductable */
?>
<?php
if(isset($_POST['submit'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$WarrentyName = $_POST['warrentyname'];
$TaxPayerID = $_POST['taxpayerid'];
$VIN = $_POST['vin'];
$Date = $_POST['date'];
$query = "SELECT warrentyname, deductable
			FROM Warrenty
			WHERE TaxPayerID = '$TaxPayerID'
			AND WarrentyName = '$WarrentyName'
			AND '$Date' BETWEEN StartDate AND EndDate";
$result = mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
$row = mysql_fetch_array($result);
if(isset($row['warrentyname'])){
	echo "The Customer has WarrentyCoverage with a deductable of $";
	echo $row['deductable'];
	}
else 
	echo "The Customer does not have coverage";
}
?>



<html><body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Customer TaxPayerID: <input name = "taxpayerid" type = "number"/><br />
VIN# of Customers Car: <input name = "vin" type = "number"/><br />
Name of warrenty required: <input name = "warrentyname" type = "text"/><br />
Date: <input name = "date" type = "date"/><br />
<input type = "submit" name = "submit" value = "Submit"/>
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>