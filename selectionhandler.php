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