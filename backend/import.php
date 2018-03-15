<?php
$DB_HOST = "localhost";
$DB_USER = "xxx";
$DB_PASS = "xxx";
$DB_NAME = "xxx";

$con = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if($con->connect_errno > 0) {
  die('Connection failed [' . $db->connect_error . ']');
}

$tableName  = 'yourtable';
$backupFile = 'yourtable.sql';
$query      = "LOAD DATA INFILE 'backupFile' INTO TABLE $tableName";
$result = mysqli_query($con,$query);
?>
