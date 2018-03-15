<?php
session_start();

include 'dbh.php';
$pass = $_POST['password'];
$username = $_POST['username'];

if (isset($_POST['submit'])){
if (isset($_POST['password']) && isset($_POST['username'])) {
        $sql = "SELECT CONCAT(voter_id,voter_no), voter_key, CONCAT(voter_fname,' ',voter_lname) AS fullname, isVoted
                FROM voter_list WHERE CONCAT(voter_id,voter_no)='$username' AND voter_key='$pass'";
        $result = mysqli_query($conn,$sql);
        if(!$row = mysqli_fetch_assoc($result)){
          echo $username;
          echo $pass;
          echo "Incorrect Credentials";
        }
        else{
          if($row['isVoted']=='false'){
          $_SESSION['voterlogged'] = true;
          $_SESSION['id'] = $_POST['username'];
          $_SESSION['username'] = $row['fullname'];
          header( 'Location: ../vote.php' ) ;
          exit();}
          else{
            echo 'You already Voted';
          }
        }
}
}
else{
  header( 'Location: admin.php');
  exit();
}
