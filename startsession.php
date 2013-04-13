<!-- Project 3660 
 Due: 2013 April 18
 Creators: Jay, Chris, Robert
 Name: startsession.php
 Objective: starts the session with the user
 -->
<html><body>
<?php
session_start();
$_SESSION['UserName'] = $_POST['username'];
$_SESSION['Password'] = $_POST['password'];
header("Location:Menu.php");
?>
</body></html>