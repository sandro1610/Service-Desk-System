<?php
 include '../includes/conn.php';
     session_start();
 if (empty($_SESSION['email']) && empty($_SESSION['password']) && empty($_SESSION['id_user'])){
    header("Location:../index.php");
  }elseif ($_SESSION['level'] != 'staff') {
    header("Location:../index.php");
  }
$html='<!DOCTYPE html>
<html lang="en">
<head>
  <title>INSERDES</title>
  <meta charset="utf-8">
  <link rel="icon" href="../assets/img/icons/favicon.ico" type="image/png">
</head>
<body>
	<table align="center" style="border: solid;" border="2">
		  <tr>
		    <th rowspan="2"><h2><img height="40px" src="../assets/img/icons/kop.png">PT INDONESIA ASAHAN ALUMINIUM (Persero)</h2></th>
		    <td style="border-color: black;">No. Dokumen/Revisi</td>
		  </tr>
		  <tr style="border-color: black;">
		    <td>SIT-FR &nbsp; &nbsp;  - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ &nbsp;</td>
		  </tr>
	</table>
	<h2 align="center">Laporan Request Inalum Service Desk System</h2>
	<table border="1" cellpadding="10" cellspacing="0">
          <thead>
              <tr style="border: solid;" border="3">
                  <th>No Ticket</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Section</th>
                  <th>Request</th>
                  <th>Description</th>
                  <th>Item</th>
                  <th>Attachment</th>
                  <th>E-mail</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>';
              $id_section = $_SESSION['id_section'];
              $sql = "SELECT * FROM tb_request 
                      INNER JOIN tb_user ON tb_request.id_user = tb_user.id_user
                      INNER JOIN tb_section ON tb_user.id_section = tb_section.id_section
                      INNER JOIN tb_kind_req ON tb_kind_req.id_request = tb_request.id_request
                      INNER JOIN tb_item ON tb_request.id_item = tb_item.id_item
                      WHERE tb_problem.id_section = '$id_section'";
                  $query = mysqli_query($link,$sql);
                  while($hasil=mysqli_fetch_array($query)){
                  	$status = "";
                  		if ($hasil['status'] < 1) {
                       $status = "Draft";
                      }elseif($hasil['status'] == 1){
                        $status = "New Request";
                      }elseif($hasil['status'] == 2){
                        $status = "Approved";
                      }elseif($hasil['status'] == 3){
                        $status = "Proccessed";
                      }elseif($hasil['status'] == 4){
                        $status = "Taking Over";
                      }elseif($hasil['status'] == 5){
                        $status = "Finish";
                      }else{
                        $status = "Rejected";
                      }
            $html .='<tr>
            	  <td>'.$hasil['no_ticket'].'></td>
                <td>'.$hasil['tgl_req'].'></td>
                <td>'.$hasil['nama'].'></td>
                <td>'.$hasil['section'].'></td>
                <td>'.$hasil['name_request'].'></td>
                <td>'.$hasil['description'].'></td>
                <td>'.$hasil['name_item'].'></td>
                <td>'.$hasil['attachment'].'></td>
                <td>'.$hasil['email'].'></td>
	             </tr>';
	               }
         $html .='</tbody>
      </table>
</body>
</html>';


// Require composer autoload
require_once __DIR__ . '../../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L', 'format' => 'A4']);

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('Laporan_Request_ISDS.pdf', 'I');