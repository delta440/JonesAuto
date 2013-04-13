<!-- Project 3660 
 Due: 2013 April 18
 Creators: Jay, Chris, Robert
 Name: selection handler
 Objective: 
 -->
<html><body>
<?php
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
		include('createcustomer.php');
		break;
	default:
		echo "has not been implemented";
		break;
		}
?>
</body></html>