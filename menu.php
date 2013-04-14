<!-- Project 3660 
 Due: 2013 April 18
 Creators: Jay, Chris, Robert
 Name: menu.php
 Objective: to provide a selection of forms and reports for the user
 -->
<?php
if(isset($_POST['selection'])){
session_start();
switch($_POST['selection']){
	case "Setup Database":
		header("Location:installdatabase.php");
		break;
	case "Logout":
		session_destroy();
		echo "Successfully Logged Out";
		break;
	case "Add New Customer":
		header('Location:createcustomer.php');
		break;
	case "Add New Employee":
		header('Location:createemployee.php');
		break;
	case "Sale Form":
		header('Location:saleform.php');
		break;
	case "Purchase Form":
		header('Location:purchaseform.php');
		break;
	case "Add Payment":
		header('Location:addpayment.php');
		break;
	case "Search For Customer":
		header('Location:searchforcustomer.php');
		break;
	case "Edit Customer":
		header('Location:editcustomer.php');
		break;
	default:
		echo "has not been implemented";
		break;
		}
}
?>
<html><body>
<h4>Please select an operation</h4>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "post">
<select name = "selection">
<option>Setup Database</option>
<option>Add New Customer</option>
<option>Add New Employee</option>
<option>Purchase Form</option>
<option>Sale Form</option>
<option>Add Payment</option>
<option>Search For Customer</option>
<option>Edit Customer</option>
<option>Logout</option>
</select>
<input type="submit" value="Submit"/>
</form>
</body></html>