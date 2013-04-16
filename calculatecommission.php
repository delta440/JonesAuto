<html><head><title>Calculate Commission</title></head></html>
<?php/*Project 3660 
 Due: 2013 April 18
 Creators: Jay, Chris, Robert
 Name: calculatecommission.php
 Objective: To display the commission earned and calcuated over a time interval*/
?>
<?php
if(isset($_POST['submit'])){
include('sqlconnect.php');
mysql_query("USE jonesauto");
$StartDate = $_POST['startdate'];
$EndDate = $_POST['enddate'];
$EmployeeID = $_POST['employeeid'];
$Soldsum = "SELECT SUM(Commission)as ssum 
			FROM Sold 
			WHERE EmployeeID = '$EmployeeID' AND DateOfSale BETWEEN '$StartDate' AND '$EndDate'";
$Warrentysum = "(SELECT SUM(Warrenty.Cost * 0.25)as wsum
				FROM Warrenty, Sold
				WHERE Sold.SaleID = Warrenty.SaleID AND Sold.EmployeeID = '$EmployeeID'
				AND Sold.DateOfSale BETWEEN '$StartDate' AND '$EndDate')";
$result1 = mysql_query($Warrentysum) or die('Query"' . $Warrentysum . '" failed' . mysql_error());
$result2 = mysql_query($Soldsum) or die('Query"' . $Soldsum . '" failed' . mysql_error());
$row1 = mysql_fetch_array($result1);
$row2 = mysql_fetch_array($result2);
echo "Commission for the given time period is: $";
echo $row1['wsum']+$row2['ssum'];
echo "<br /> Commission on warrenties= $"; 
echo $row1['wsum']; 
echo "<br /> Commission on cars= $";
echo $row2['ssum'];

}
?>

<html><body>
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
EmployeeID: <input name = "employeeid" type = "text"/><br />
Start Date: <input name = "startdate" type = "date"/><br />
End Date: <input name = "enddate" type = "date"/><br />
<input name = "submit" type = "submit" value = "Submit"/><br />
</form>

<form action="menu.php">
<input type = "submit" value = "Back to menu"/>
</form>
</body></html>

