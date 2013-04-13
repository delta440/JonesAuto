<?php
if(isset($_POST['submit'])){ 
$FirstName = $_POST['firstname'];
$LastName = $_POST['lastname'];
$PhoneNumber = $_POST['phonenumber'];
include('sqlconnect.php');
mysql_query("USE jonesauto");
$query ="INSERT INTO employee(PhoneNumber, FirstName, LastName) 
		VALUES('$PhoneNumber', '$FirstName', '$LastName')";
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
<input name = "submit" type = "submit" value = "Submit"/><br />
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>