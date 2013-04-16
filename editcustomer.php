<html><head><title>Edit Customer</title></head></html>

<?php
if(isset($_POST['submit'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$TaxPayerID = $_SESSION['taxpayerid'];
$FirstName = $_POST['firstname'];
$LastName = $_POST['lastname'];
$PhoneNumber = $_POST['phonenumber'];
$Gender = $_POST['gender'];
$City = $_POST['city'];
$State = $_POST['state'];
$Zip = $_POST['zip'];
$query = "UPDATE Customer 
			SET FirstName='$FirstName', LastName = '$LastName', PhoneNumber='$PhoneNumber',
			Gender='$Gender', City='$City', State='$State', Zip='$Zip'
			WHERE TaxPayerID = '$TaxPayerID'";
mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
}
?>



<?php if(!isset($_POST['continue'])){ ?>
<html>
<body>
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
TaxPayerID: <input name = "taxpayerid" type = "number"/><br />
<input name = "continue" type = "submit" value = "Continue"/><br />
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>
<?php } ?>

<?php if(isset($_POST['continue'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$TaxPayerID = $_POST['taxpayerid'];
$_SESSION['taxpayerid'] = $TaxPayerID;
$query = "SELECT * FROM Customer WHERE TaxPayerID = '$TaxPayerID'";
$result = mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
$row = mysql_fetch_array($result);
echo "<html><body><form action=".htmlentities($_SERVER['PHP_SELF']) . ' method="post">';
echo 'FirstName: <input name = "firstname" type = "text" value = '.$row['FirstName'].' /><br />';
echo 'LastName: <input name = "lastname" type = "text" value = '.$row['LastName'].' /><br />';
echo 'PhoneNumber: <input name = "phonenumber" type = "tel" value = '.$row['PhoneNumber'].' /><br />';
echo 'Gender: <select name = "gender" >';
if($row['Gender'] == "Male")
	echo '<option selected>Male</option>';
else
	echo '<option>Male</option>';
if($row['Gender'] == "Female")
	echo '<option selected>Female</option>';
else
	echo '<option>Female</option>';
echo '</select><br />';
echo 'City: <input name = "city" type = "text" value = '.$row['City'].' /><br />';
echo 'State: <input name = "state" type = "text" value = '.$row['State'].' /><br />';
echo 'Zip: <input name = "zip" type = "number" value = '.$row['Zip'].' /><br />';
echo '<input name = "submit" type = "submit" value = "Submit"/><br />';

echo '</form>';
echo '</body></html>';
}
?>