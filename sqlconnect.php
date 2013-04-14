<!-- Project 3660 
 Due: 2013 April 18
 Creators: Jay, Chris, Robert
 Name: sqlconnect.php
 Objective: to connect the database with the user
 -->
<?php
session_start();
$host = "localhost";
if(isset($_SESSION['UserName']) && isset($_SESSION['Password'])){
	$sqlconnection = mysql_pconnect("$host", $_SESSION['UserName'], $_SESSION['Password']) or die("cannot connect to sql server");
}
else
	echo "error no session username/password"
?>
