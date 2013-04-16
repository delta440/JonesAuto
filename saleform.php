<html><head><title>Sale Form</title></head></html>
<?php/*Project 3660 
 Due: 2013 April 18
 Creators: Jay, Chris, Robert
 Name: saleform.php
 Objective: To allow the user to remove a vehicle from the database and sell it to a cusotmer. Taking customer information and warrenty information*/
?>

<?php
//insert sale form
if(isset($_POST['continue'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$_SESSION['taxpayerid'] = $_POST['taxpayerid'];
$_SESSION['vin'] = $_POST['vin'];
$DateOfSale = $_POST['dateofsale'];
$TotalDue = $_POST['totaldue'];
$DownPayment = $_POST['downpayment'];
$FinancedAmount = $_POST['financedamount'];
$Commission = $_POST['commission'];
$CosignerFirstName = $_POST['cosignerfirstname'];
$CosignerLastName = $_POST['cosignerlastname'];
$VIN = $_POST['vin'];
$TaxPayerID = $_POST['taxpayerid'];
$EmployeeID = $_POST['employeeid'];
$query ="INSERT INTO sold(DateOfSale, TotalDue, DownPayment, FinancedAmount, Commission,
		CosignerFirstName, CosignerLastName, VIN, TaxPayerID, EmployeeID) 
		VALUES('$DateOfSale', '$TotalDue', '$DownPayment', '$FinancedAmount', '$Commission', 
		'$CosignerFirstName', '$CosignerLastName', '$VIN', '$TaxPayerID', '$EmployeeID')";
mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
} ?>
<!--insert employee history form-->
<?php if(isset($_POST['continue2']) || isset($_POST['addmoreemploymenthistory'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$Employer = $_POST['employer'];
$Title = $_POST['title'];
$SupervisorFirstName = $_POST['supervisorfirstname'];
$SupervisorLastName = $_POST['supervisorlastname'];
$PhoneNumber = $_POST['phonenumber'];
$City = $_POST['city'];
$State = $_POST['state'];
$Zip = $_POST['zip'];
$TaxPayerID = $_SESSION['taxpayerid'];
$query ="INSERT INTO employmenthistory(Employer, Title, SupervisorFirstName, SupervisorLastName,
		PhoneNumber, City, State, Zip, TaxPayerID) 
		VALUES('$Employer', '$Title', '$SupervisorFirstName', '$SupervisorLastName', 
		'$PhoneNumber', '$City', '$State', '$Zip', '$TaxPayerID')";
mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
} ?>


<?php
//insert warrenty form
if(isset($_POST['addanotherwarrenty']) || isset($_POST['continue3'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$VIN = $_SESSION['vin'];
$WarrentyName = $_POST['warrentyname'];
$StartDate = $_POST['startdate'];
$EndDate = $_POST['enddate'];
$Length = $_POST['length'];
$Deductable = $_POST['deductable'];
$Cost = $_POST['cost'];
$TaxPayerID = $_SESSION['taxpayerid'];
$query = "SELECT SaleID FROM Sold WHERE VIN = '$VIN'";
$result = mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
$row = mysql_fetch_row($result);
$SaleID = $row[0];
$query ="INSERT INTO warrenty(WarrentyName, StartDate, EndDate, Length, Deductable, Cost, VIN, 
							TaxPayerID, SaleID) 
		VALUES('$WarrentyName', '$StartDate', '$EndDate', '$Length', 
		'$Deductable', '$Cost', '$VIN', '$TaxPayerID', '$SaleID')";
mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
}
?>
<!--display warrenty form-->
<?php if((isset($_POST['continue']) && $_POST['isaddingemploymenthistory'] == "No")
		||isset($_POST['continue2']) || isset($_POST['addanotherwarrenty'])){ ?>
<html><body>
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Warrenty Name: <input name = "warrentyname" type = "text"/><br />
Start Date: <input name = "startdate" type = "date"/><br />
End Date: <input name = "enddate" type = "date"/><br />
Length: <input name = "length" type = "number"/><br />
Deductable: <input name = "deductable" type = "number"/><br />
Cost: <input name = "cost" type = "number"/><br />

<input name = "addanotherwarrenty" type ="submit" value ="Add Another"/>
<input name = "continue3" type ="submit" value ="Continue"/>
<input name = "skip" type ="submit" value ="Skip"/><br />
</form>
</body></html>
<?php } ?>
<!--display employer history form-->
<?php if(isset($_POST['continue']) && $_POST['isaddingemploymenthistory'] == "Yes"
		|| isset($_POST['addmoreemploymenthistory'])){ ?>
<html>
<head><title>Sale Form</title></head>
<body>
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Employer: <input name = "employer" type = "text"/><br />
Title: <input name = "title" type = "text"/><br />
SupervisorFirstName: <input name = "supervisorfirstname" type = "text"/><br />
SupervisorLastName: <input name = "supervisorlastname" type = "text"/><br />
PhoneNumber: <input name = "phonenumber" type = "tel"/><br />
City: <input name = "city" type = "text"/><br />
State: <input name = "state" type = "text"/><br />
Zip: <input name = "zip" type = "number"/><br />
<input name = "addmoreemploymenthistory" type ="submit" value ="Add More Employment History"/><br />
<input name = "continue2" type ="submit" value ="Continue"/><br />
</form>
</body></html>

<?php } ?>

<!--display sale form-->
<?php if(!isset($_POST['continue']) && !isset($_POST['continue2']) 
		&& !isset($_POST['addanotherwarrenty'])
		&& !isset($_POST['addmoreemploymenthistory'])){ ?>
<html>
<head><title>Sale Form</title></head>
<body>
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Date of Sale: <input name = "dateofsale" type = "date"/><br />
Total Due: <input name = "totaldue" type = "number"/><br />
Down Payment: <input name = "downpayment" type = "number"/><br />
Financed Amount: <input name ="financedamount" type = "number"/><br />
Customer TaxPayerID: <input name ="taxpayerid" type = "number"/><br />
CosignerFirstName: <input name = "cosignerfirstname" type = "text"/><br />
CosignerLastName: <input name = "cosignerlastname" type = "text"/><br />
Salesperson's EmpolyeeID: <input name ="employeeid" type = "number"/><br />
Commission: <input name = "commission" type = "number"/><br />
VIN#: <input name ="vin" type ="number"/><br />
Would you like to add Employment History? <select name ="isaddingemploymenthistory">
<option>Yes</option>
<option>No</option>
</select>
<input name = "continue" type ="submit" value ="Continue"/><br />
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>
<?php } ?>