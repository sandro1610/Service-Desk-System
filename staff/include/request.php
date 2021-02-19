<?php
$koneksi    = mysqli_connect("localhost", "root", "", "isds");
$jumlah = '';
$name_request = '';
$query  = mysqli_query($koneksi, "SELECT tb_request.id_request, tb_kind_req.name_request, COUNT(*) AS jumlah FROM tb_request 
                                  INNER JOIN tb_kind_req ON tb_request.id_request = tb_kind_req.id_request 
                                  GROUP BY name_request");
while ($row = mysqli_fetch_array($query)) {
  $jumlah = $jumlah.'"'.$row['jumlah'].'",';
  $name_request = $name_request.'"'.$row['name_request'].'",';
}
$jumlah = trim($jumlah,",");
$name_request = trim($name_request,",");
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
      labels: [<?= $name_request; ?>],
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