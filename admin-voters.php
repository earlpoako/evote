<?php
session_start();
if (!$_SESSION['logged']) {
  header('Location: login.php?loginfirst');
  exit();
}
?>
<!doctype html>
<html ng-app="myDashboard">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>EVote Admin Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-4.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="admin.php#/" class="simple-text">
                    EVOTE
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="admin.php#/">
                        <i class="pe-7s-graph"></i>
                        <p>Overview</p>
                    </a>
                </li>
								<li>
                    <a href="admin-voters.php">
                        <i class="pe-7s-note2"></i>
                        <p>Voter List</p>
                    </a>
                </li>
								<li>
										<a href="admin.php#/election">
											<i class="pe-7s-config"></i>
											<p>Manage Elections</p>
										</a>
								</li>
								<li>
										<a href="admin.php#ballot">
											<i class="pe-7s-news-paper"></i>
											<p>Ballot</p>
										</a>
								</li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="backend/logout.php">
                               Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-4">
                  <div class="card">
                    <div class="header"><h4 class="title">Search</h4></div>
                    <div class="content">
                      <div class="row">
                      <div class="col-md-12">
                        <form action="admin-voters.php" method="POST">
                        <div class="input-group">
                          <input type="text" class="form-control" name="search" placeholder="Search for...">
                          <span class="input-group-btn">
                          <input type="submit" class="btn btn-default" value="Go!"/>
                          </span>
                        </div>
                        </form>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Registered Voters</h4>
                      </div>
                      <div class="content table-responsive table-full-width">
              <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "alpha";
              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              // Check connection
              if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
              }
              if(isset($_POST['search'])){
              if($_POST['search']!=''){
              $sql = "SELECT CONCAT(voter_id,voter_no) AS voter_id, voter_fname, voter_lname, voter_section, voter_key, isVoted FROM voter_list WHERE CONCAT(voter_id,voter_no)='".$_POST["search"]."'";
              }
              else {
                $sql = "SELECT CONCAT(voter_id,voter_no) AS voter_id, voter_fname, voter_lname, voter_section, voter_key, isVoted FROM voter_list";
              }
              }
              else{
                $sql = "SELECT CONCAT(voter_id,voter_no) AS voter_id, voter_fname, voter_lname, voter_section, voter_key, isVoted FROM voter_list";
              }
              $result = $conn->query($sql);



              if ($result->num_rows > 0) {
              echo "<table  class='table table-hover table-striped'>
              <thead>
              <th>Voter ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Class Section</th>
							<th>Voter Key</th>
              <th>Has Voted</th>
              </thead>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["voter_id"]. "</td><td>" . $row["voter_fname"]. "</td><td>" . $row["voter_lname"]. "</td><td>".$row["voter_section"]."</td><td>".$row["voter_key"]."</td><td>".$row["isVoted"]."</td></tr>";
              }
              echo "</table>";
              } else {
              echo "<p style='margin: 10px'>No Results Found</p>";
              }

              $conn->close();
              ?>
                  </div>
                </div>
              </div>
              </div>


            </div>
        </div>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
	<script src="angular/angular.js"></script>
	<script src="angular/angular-route.js"></script>
	<script src="assets/js/app.js"></script>
  <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
