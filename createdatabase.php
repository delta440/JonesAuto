<?php
include('sqlconnect.php');
$result = mysql_query("CREATE DATABASE JonesAuto");
if (!$result)
echo "Database not created " . mysql_error();
else
echo "Database created ";
?>