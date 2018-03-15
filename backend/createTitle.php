<?php

include 'dbh.php';

$position = $_POST['position'];
$desc = $_POST['desc'];
$sql = "INSERT INTO titles (position, descr) VALUES ('$position', '$desc')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

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


 header("Location: ../admin.php#/election");
 exit();
