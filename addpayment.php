<?php
if(isset($_POST['submit'])){
$AmountDue = $_POST['amountdue'];
$AmountPaid = $_POST['amountpaid'];
$DueDate = $_POST['duedate'];
$DatePaid = $_POST['datepaid'];
$BankAccount = $_POST['bankaccount'];
$VIN = $_POST['vin'];
$TaxPayerID = $_POST['taxpayerid'];
include('sqlconnect.php');
mysql_query("USE jonesauto");
$query ="INSERT INTO payments(AmountDue, DueDate, DatePaid, AmountPaid, BankAccount,
		VIN, TaxPayerID) 
		VALUES('$AmountDue', '$DueDate', '$DatePaid', '$AmountPaid', '$BankAccount', 
		'$VIN', '$TaxPayerID')";
mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
}



?>

<html>
<head><title>Add Payment</title></head>
<body>
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Amount Due: <input name = "amountdue" type = "text"/>
Amount Paid: <input name = "amountpaid" type = "text"/><br />
Due Date: <input name = "duedate" type = "text"/>
Date Paid: <input name = "datepaid" type = "text"/><br />
Bank Account: <input name = "bankaccount" type = "number"/><br />
VIN# of car being paid for: <input name = "vin" type = "number"/><br />
TaxPayerID of customer: <input name = "taxpayerid" type = "number"/><br />
<input type = "submit" value = "Submit" name = "submit"/>
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>