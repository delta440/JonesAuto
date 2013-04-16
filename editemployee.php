<html><head><title>Edit Employee</title></head></html>

<?php if(isset($_POST['submit'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$EmployeeID = $_SESSION['employeeid'];
$FirstName = $_POST['firstname'];
$LastName = $_POST['lastname'];
$PhoneNumber = $_POST['phonenumber'];
$query = "UPDATE Employee 
			SET FirstName='$FirstName', LastName = '$LastName', PhoneNumber='$PhoneNumber'
			WHERE EmployeeID = '$EmployeeID'";
mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
}

?>

<?php if(isset($_POST['continue'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$EmployeeID = $_POST['employeeid'];
$_SESSION['employeeid'] = $EmployeeID;
$query = "SELECT * FROM Employee WHERE EmployeeID = '$EmployeeID'";
$result = mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
$row = mysql_fetch_array($result);
echo "<html><body><form action=".htmlentities($_SERVER['PHP_SELF']) . ' method="post">';
echo 'FirstName: <input name = "firstname" type = "text" value = '.$row['FirstName'].' /><br />';
echo 'LastName: <input name = "lastname" type = "text" value = '.$row['LastName'].' /><br />';
echo 'PhoneNumber: <input name = "phonenumber" type = "tel" value = '.$row['PhoneNumber'].' /><br />';
echo '<input name = "submit" type = "submit" value = "Submit"/><br />';
echo '</form>';
echo '</body></html>';
}
?>

<?php if(!isset($_POST['continue'])){ ?>
<html>
<body>
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
EmployeeID: <input name = "employeeid" type = "number"/><br />
<input name = "continue" type = "submit" value = "Continue"/>
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>
<?php } ?>