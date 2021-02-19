<?php
$koneksi    = mysqli_connect("localhost", "root", "", "isds");
$jumlah = '';
$name_service = '';
$query  = mysqli_query($koneksi, "SELECT tb_problem.id_service, tb_service.name_service, COUNT(*) AS jumlah FROM tb_problem 
                                  INNER JOIN tb_service ON tb_problem.id_service = tb_service.id_service 
                                  GROUP BY name_service");
while ($row = mysqli_fetch_array($query)) {
  $jumlah = $jumlah.'"'.$row['jumlah'].'",';
  $name_service = $name_service.'"'.$row['name_service'].'",';
}
$jumlah = trim($jumlah,",");
$name_service = trim($name_service,",");
?>

<!DOCTYPE html>
<html> 
  <head>
    <script src="../../assets/js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 40%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
      <canvas id="bar-chart" width="200" height="200"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  // Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: [<?= $name_service; ?>],
      datasets: [
        {
          label: "Jumlah",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: [<?= $jumlah; ?>,0,10]
        }
      ]
    },
    options: {
      legend: { display: false }
    }
});
</script>