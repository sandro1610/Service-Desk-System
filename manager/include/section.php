<?php
$koneksi    = mysqli_connect("localhost", "root", "", "isds");
$jumlah_problem = '';
$jumlah_request = '';
$section = '';
$query  = mysqli_query($koneksi, "SELECT tb_problem.id_section, tb_section.section, COUNT(*) AS jumlah FROM tb_problem 
                                  INNER JOIN tb_section ON tb_problem.id_section = tb_section.id_section 
                                  GROUP BY section");
while ($row = mysqli_fetch_array($query)) {
  $jumlah_problem = $jumlah_problem.'"'.$row['jumlah'].'",';
  $section = $section.'"'.$row['section'].'",';
}
$sql  = mysqli_query($koneksi, "SELECT tb_request.id_section, tb_section.section, COUNT(*) AS jumlah FROM tb_request 
                                  INNER JOIN tb_section ON tb_request.id_section = tb_section.id_section 
                                  GROUP BY section");
while ($row = mysqli_fetch_array($query)) {
  $jumlah_request = $jumlah_request.'"'.$row['jumlah'].'",';
}
$jumlah_request = trim($jumlah_request,",");
$jumlah_problem = trim($jumlah_problem,",");
$section = trim($section,",");
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
      labels: [<?= $section; ?>],
      datasets: [
        {
          label: "Problem",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: [<?= $jumlah_problem; ?>,0,10]
        },{
          label: "Request",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: [<?= $jumlah_request; ?>,0,10]
        }
      ]
    },
    options: {
      legend: { display: false }
    }
});
</script>