<?php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "alpha";

$con = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if($con->connect_errno > 0) {
  die('Connection failed [' . $db->connect_error . ']');
}

$tableName  = 'candidate_list';
$backupFile = 'backup.sql';
$sqlquery      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
$result = mysqli_query($con,$sqlquery);
$tableName2  = 'titles';
$backupFile2 = 'backup2.sql';
$sqlquery2      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
$result2 = mysqli_query($con,$sqlquery2);

$sql = "TRUNCATE TABLE candidate_list";
$rs = mysqli_query($con,$sql);
$sql2 = "TRUNCATE TABLE titles";
$rs2 = mysqli_query($con,$sql2);

function get_data(){

  $connect = mysqli_connect("localhost", "root","","alpha");
  $query = "SELECT * FROM candidate_list";
  $result = mysqli_query($connect, $query);
  $candidate_data = array();
  while ($row = mysqli_fetch_array($result)) {
    $candidate_data[] = array(
      'id' => $row["candidate_id"],
      'name' => $row["candidate_name"],
      'position' => $row["candidate_position"],
      'party' => $row["candidate_party"]
        );
  }

  return json_encode($candidate_data);
}

$file_name = 'candidate.json';
if (file_put_contents($file_name, get_data())) {
  # code...
  echo $file_name . 'file created';
}
function get_title(){

  $connect = mysqli_connect("localhost", "root","","alpha");
  $query = "SELECT * FROM titles";
  $result = mysqli_query($connect, $query);
  $position_data = array();
  while ($row = mysqli_fetch_array($result)) {
    $position_data[] = array(
      'title' => $row["position"],
      'descr' => $row["descr"]
        );
  }

  return json_encode($position_data);
}
$file_name2 = 'title.json';
if (file_put_contents($file_name2, get_title())) {
  # code...
  echo $file_name2. 'file created';
}


 header("Location: ../admin.php#/");
 exit();
?>
