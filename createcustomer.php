<?php
if(isset($_POST['submit'])){ 
$FirstName = $_POST['firstname'];
$LastName = $_POST['lastname'];
$PhoneNumber = $_POST['phonenumber'];
$Gender = $_POST['gender'];
$City = $_POST['city'];
$State = $_POST['state'];
$Zip = $_POST['zip'];
$TaxPayerID = $_POST['taxpayerid'];
include('sqlconnect.php');
mysql_query("USE jonesauto");
$query ="INSERT INTO customer(PhoneNumber, Gender, FirstName, LastName, City,
		State, Zip, TaxPayerID) 
		VALUES('$PhoneNumber', '$Gender', '$FirstName', '$LastName', '$City', 
		'$State', '$Zip', '$TaxPayerID')";
mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
}
?>
<html>
<head><title>Customer Form</title></head>
<body>
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
FirstName: <input name = "firstname" type = "text"/><br />
LastName: <input name = "lastname" type = "text"/><br />
PhoneNumber: <input name = "phonenumber" type = "tel"/><br />
Gender: <select name = "gender">
<option>Male</option>
<option>Female</option>
</select><br />
City: <input name = "city" type = "text"/><br />
State: <input name = "state" type = "text"/><br />
Zip: <input name = "zip" type = "number"/><br />
TaxPayerID: <input name = "taxpayerid" type = "number"/><br />
<input name = "submit" type = "submit" value = "Submit"/><br />
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>