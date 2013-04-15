<?php
/*Project 3660 
 Due: 2013 April 18
 Creators: Jay, Chris, Robert
 Name: createdatabase.php 
 Objective: create the database*/

include('sqlconnect.php');
$result = mysql_query("CREATE DATABASE JonesAuto");
if (!$result)
echo "Database not created " . mysql_error();
else
echo "Database created ";
?>