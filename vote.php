<?php

session_start();
if (!$_SESSION['voterlogged']) {
  header('Location: login2.php?loginfirst');
  exit();
}
?>
<!doctype html>
<html ng-app="myDashboard">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Election</title>

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
	<form action="backend/countvotes.php" method="GET" target="_blank">
  <div class="content">
  <div class="container-fluid">
  <div ng-controller='voteController as vc'>
  <div ng-repeat='position in positions'>
  <div class="row">
      <div class="card" style="margin:10px auto; width: 55rem">
        <div class="header">
          <h4 class="title">{{position.title}}</h4>
          <p class="category">{{position.descr}}</p>
        </div>
        <div class="content">
          <div class="table-full-width">
            <table class="table">
              <tbody>
                <tr ng-repeat='item in candidates'ng-if='item.position==position.title'>
                  <td><input type="radio" class="option-input" name="{{position.title}}" value="{{item.id}}"><label style="margin: 10px"><h4>{{item.name}}, {{item.party}}</h4></label></td>
                </tr>
              </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
	<input type="submit" class="btn btn-info btn-fill pull-right" value="Submit"/>
  <div class="clearfix"><div>
  </div>
</div>
</div>
</form>
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
