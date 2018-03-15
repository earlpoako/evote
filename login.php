<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
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

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<section>
					    <div class="content" style="margin: auto; width: 35rem">
					      <form action="backend/verify-admin.php" method="POST">
					          <div>
					            <label>Username</label>
					            <input type="text" class="form-control" style="margin: 10px 10px" name="username" placeholder="Username">
					          </div>
					          <div>
					            <label>Password</label>
					            <input type="password" class="form-control" style="margin: 10px 10px" name="password" placeholder="Password">
					          </div>
						        <input type="submit" class="btn btn-info btn-fill pull-right" value="Login" name="submit">
					      </form>
								</div>
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
		<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	</body>
</html>
