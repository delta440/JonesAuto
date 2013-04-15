<?php
 /*Project 3660 
 Due: 2013 April 18
 Creators: Jay, Chris, Robert
 Name: purchaseform.php
	 Objective: to input a tuple into the purchase table*/
?>
<html>
<head><title>Purchase Form</title></head>
<body>
<?php 
if(isset($_POST['continue'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$_SESSION['vin'] = $_POST['vin'];
$EmployeeID = $_POST['employeeid'];
$PurchaseDate = $_POST['purchasedate'];
$City = $_POST['city'];
$State = $_POST['state'];
$Zip = $_POST['zip'];
$Auction = $_POST['auction'];
$TaxID = $_POST['taxid'];
$Seller = $_POST['seller'];
$VIN = $_POST['vin'];
$Make = $_POST['make'];
$Model = $_POST['model'];
$Color = $_POST['color'];
$Miles = $_POST['miles'];
$PricePaid = $_POST['paidprice'];
$InteriorColor = $_POST['interiorcolor'];
$CarCondition = $_POST['condition'];
$BookPrice = $_POST['bookprice'];
$query ="INSERT INTO vehicle(VIN, Make, Model, Color, Miles, InteriorColor, BookPrice, CarCondition)
		VALUES('$VIN', '$Make', '$Model', '$Color', '$Miles', '$InteriorColor', '$BookPrice', '$CarCondition')";
mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());



$query ="INSERT INTO purchasedfordealership(DateOfPurchase, CityOfPurchase, StateOfPurchase,
		ZipOfPurchase, Auction, TaxID, Seller, VIN, EmployeeID, PricePaid)
		VALUES('$PurchaseDate', '$City', '$State', '$Zip', '$Auction', '$TaxID', '$Seller', 
		'$VIN', '$EmployeeID', '$PricePaid')";
mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
}

if(isset($_POST['continue3'])  || isset($_POST['addanotherproblem'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$EstimatedRepairCost= $_POST['estimatedrepaircost'];
$ActualCost= $_POST['actualcost'];
$Problem= $_POST['problem'];
$VIN= $_SESSION['vin'];
$query ="INSERT INTO repaired(EstimatedCost, ActualCost, Problem, VIN) 
		VALUES('$EstimatedRepairCost', '$ActualCost', '$Problem', '$VIN')";
mysql_query($query) or die('Query"' . $query . '" failed' . mysql_error());
}

?>

<?php if(!isset($_POST['continue']) && !isset($_POST['continue2']) && !isset($_POST['addanotherproblem']) || 
	(isset($_POST['isproblem']) && $_POST['isproblem'] == "No")){ 
	?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
EmployeeID: <input name = "employeeid" type = "number"/><br />
Date of purchase: <input name = "purchasedate" type = "date"/><br />
City: <input name= "city" type= "text"/><br />
State: <input name= "state" type= "text"/><br />
Zip: <input name= "zip" type= "text"/><br />
Seller/Dealer: <input name= "seller" type= "text"/><br />
TaxID: <input name= "taxid" type= "number"/><br />
Auction(yes/no): <input name= "auction" type= "text"/><br />
<br />
Make: <input name= "make" type= "text"/><br />
Model:  <input name= "model" type= "text"/><br />
Year: <input name= "year" type= "number"/><br />
Color: <input name= "color" type= "text"/><br />
Interior Color: <input name= "interiorcolor" type= "number"/><br />
Miles: <input name= "miles" type= "number"/><br />
<textarea rows="5" cols="60" name="condition" wrap="physical">
Condition of vehicle</textarea><br />
Book Price: <input name= "bookprice" type= "number"/><br />
Price Paid: <input name= "paidprice" type= "number"/><br />
VIN #: <input name= "vin" type= "number"/><br />
<input name = "continue" type = "submit" value = "Continue"/><br />
</form>
<?php } ?>

<?php if(isset($_POST['continue'])){ ?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Does the car have any Problems? <select name="isproblem">
<option>Yes</option>
<option>No</option>
<input name = "continue2" type = "submit" value = "Continue"/><br />
</form>
<?php } ?>



<?php if(isset($_POST['continue2']) && (isset($_POST['isproblem']) && $_POST['isproblem'] == "Yes") || isset($_POST['addanotherproblem'])){ 
echo isset($_POST['continue2']) . isset($_POST['addanotherproblem']);
?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<textarea rows="5" cols="60" name="problem" wrap="physical">
Description of problem</textarea><br />
Estimated Repair Cost: <input name= "estimatedrepaircost" type= "number"/><br />
Actual Cost: <input name= "actualcost" type= "number"/><br />
<input name= "addanotherproblem" type = "submit" value= "Add another problem"/>
<input name= "continue3" type = "submit" value= "Continue"/><br />
</form>
<?php } ?>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>

</body>
</html>
