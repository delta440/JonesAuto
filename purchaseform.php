<html>
<head><title>Purchase Form</title></head>
<body>
<?php 
if(isset ($_POST['seller']))
		echo $_POST['seller'];
?>
<?php if(!isset($_POST['continue']) && !isset($_POST['continue2']) && !isset($_POST['addanotherproblem'])){ ?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Date of purchase: <input name = "purchasedate" type = "date"/><br />
Location: <input name= "location" type= "text"/><br />
Seller/Dealer: <input name= "seller" type= "text"/><br />
TaxID: <input name= "taxid" type= "number"/><br />
Auction(yes/no): <input name= "auction" type= "text"/><br />
<br />
Make: <input name= "make" type= "text"/><br />
Model:  <input name= "model" type= "text"/><br />
Year: <input name= "year" type= "number"/><br />
Color: <input name= "color" type= "text"/><br />
Miles: <input name= "miles" type= "number"/><br />
<textarea rows="5" cols="60" name="condition" wrap="physical">
Condition of vehicle</textarea><br />
Book Price: <input name= "bookprice" type= "number"/><br />
Price Paid: <input name= "paidprice" type= "number"/><br />
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



<?php if(isset($_POST['continue2']) || isset($_POST['addanotherproblem'])){ ?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
Problem: <input name= "problem" type= "text"/><br />
Estimated Repair Cost: <input name= "estimatedrepaircost" type= "number"/><br />
Actual Cost: <input name= "actualcost" type= "number"/><br />
<input name= "addanotherproblem" type = "submit" value= "Add another problem"/>
<input name= "continue3" type = "submit" value= "Continue"/><br />

<?php } ?>







<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>

</body>
</html>
