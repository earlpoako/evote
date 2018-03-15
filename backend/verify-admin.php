<?php
session_start();

include 'dbh.php';
$pass = $_POST['password'];
$username = $_POST['username'];

if (isset($_POST['submit'])){
if (isset($_POST['password']) && isset($_POST['username'])) {
        $sql = "SELECT * FROM admin_list WHERE username='$username' AND password='$pass'";
        $result = mysqli_query($conn,$sql);
        if(!$row = mysqli_fetch_assoc($result)){
          echo $username;
          echo $pass;
          echo "Incorrect Credentials";
        }
        else{
          $_SESSION['logged'] = true;
          $_SESSION['id'] = $_POST['username'];
          header( 'Location: ../admin.php' ) ;
          exit();}
        }
}
else{
  header( 'Location: index.php');
  exit();
}
