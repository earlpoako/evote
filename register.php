<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Register</title>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

				<!-- Header -->
					<header id="header">
						<h1><strong><a href="index.php">EVote</a></strong></h1>
						<nav id="nav">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="index.php#three">About</a></li>
								<li><a href="login.php">Login</a></li>
							</ul>
						</nav>
					</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<section>
            <?php
            include 'backend/dbh.php';
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $section = $_POST['section'];
            $password = $_POST['password'];
            $voter_id = strtolower(substr($fname, 0, 2) . $lname);

            $sql = "INSERT INTO voter_list (voter_id, voter_fname, voter_lname, voter_section, voter_key, isVoted)
                    VALUES ('$voter_id', '$fname', '$lname', '$section', '$password', 'false')";
            if (mysqli_query($conn, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            ?>
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
            </thead>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["voter_id"]. "</td><td>" . $row["voter_fname"]. "</td><td>" . $row["voter_lname"]. "</td><td>".$row["voter_section"]."</td></tr>";
            }
            echo "</table>";
            } else {
            echo "<p style='margin: 10px'>No Results Found</p>";
            }

            $conn->close();
            ?>



					</section>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"></a></li>
						<li><a href="#" class="icon fa-twitter"></a></li>
						<li><a href="#" class="icon fa-instagram"></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
