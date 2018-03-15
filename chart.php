<head>
<title>Election Results</title>
<script src="assets/jquery v1.12.4.js"></script>
<script src="assets/canvasjs.min.js"></script>
  </head>

  <?php
    include 'backend/dbh.php';
    $view = $_GET['view'];
    $sql = "SELECT candidate_name, candidate_totalvotes FROM candidate_list WHERE candidate_position='$view' ORDER BY candidate_totalvotes DESC";
    $result = mysqli_query($conn,$sql);
    $candidate_data = array();
    while ($row = mysqli_fetch_array($result)) {
      $candidate_data[] = array(
        'y' => $row['candidate_totalvotes'],
        'label' => $row['candidate_name']
       );
    }
  ?>

      <div id="chartContainer"></div>
      <script type="text/javascript">
      $(function () {
              var chart = new CanvasJS.Chart("chartContainer", {
                  theme: "theme2",
                  animationEnabled: true,
                  title: {
                      text: "Election Results"
                  },
                  data: [
                  {
                      type: "column",
                      dataPoints: <?php echo json_encode($candidate_data, JSON_NUMERIC_CHECK); ?>
                  }
                  ]
              });
              chart.render();
          });
      </script>
