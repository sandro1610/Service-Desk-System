<?php
$section = $_SESSION['id_section'];
if(isset($_POST["Submit"])){
    $email = $_SESSION['email'];
    $tgl_prob = date('Y-m-d');
    $id_user = $_POST['id_user'];
    $id_section = $_POST['id_section'];
    $id_service = $_POST['id_service'];
    $problem = $_POST['problem'];
    $id_item = $_POST['id_item'];
    $v_key = md5(time().$id_user);

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmp_name = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf','doc','docx','xls','xlsx');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 1000000) {
          $sql = mysqli_query($link, "SELECT * FROM tb_section");
          $result = mysqli_fetch_assoc($sql);
          $date = date('d-M-Y H-i-s');
          $fileNewName = $result['section'].' '.$date.'.'.$fileActualExt;
          $fileDestination = 'upload/problem/'.$fileNewName;
          move_uploaded_file($fileTmp_name, $fileDestination);
          $sql = mysqli_query($link,"INSERT INTO tb_problem (no_ticket, tgl_prob, email, id_user, id_section, status, id_service, problem, id_item, attachment ,v_key) 
            VALUES ('',
                    '$tgl_prob',
                    '$email', 
                    '$id_user',
                    '$id_section',
                    '',
                    '$id_service',
                    '$problem',
                    '$id_item',
                    '$fileNewName',
                    '$v_key')" );
        }else{
          echo "<script>alert('Your file is too big !!');</script>";
        }
      }else{
        echo "<script>alert('Thare is an error in your file !!');</script>";
      }
    }else{
      echo "<script>alert('Sorry, only pdf, doc, docx, xls, xlsx files are allowed');</script>";
    }
    // $query = mysqli_query($link,"SELECT * FROM tb_problem 
    //                              INNER JOIN tb_user ON tb_problem.id_user = tb_user.id_user
    //                              INNER JOIN tb_section ON tb_user.id_section = tb_section.id_section
    //                              INNER JOIN tb_service ON tb_problem.id_service = tb_service.id_service
    //                              INNER JOIN tb_item ON tb_problem.id_item = tb_item.id_item
    //                              WHERE v_key = '$v_key'");
    // $hasil = mysqli_fetch_assoc($query);
  //CEK QUERY
  if ($sql) {
    // if (mysqli_num_rows($query) == 1) {
    //   $fromEmail = $email;
    //   $sqli = mysqli_query($link,"SELECT email FROM tb_user
    //                               INNER JOIN tb_user.id_section = tb_section.id_section
    //                               AND level = 'manager'");
    //   $result = mysql_fetch_assoc($sqli);
    //   $toEmail = $result['email'];
    //   $subjectName = "VERIFY THE PROBLEM FROM ".$result['section'];

    //   $to = $toEmail;
    //   $subject = $subjectName;
    //   $headers = "MIME-Version: 1.0" . "\r\n";
    //   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    //   $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
    //   $message = '<!DOCTYPE html>
    //               <html lang="en">
    //               <head>
    //                 <title>Bootstrap Example</title>
    //                 <meta charset="utf-8">
    //                 <meta name="viewport" content="width=device-width, initial-scale=1">
    //                 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    //                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    //                 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    //                 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    //               </head>
    //               <body>

    //               <div class="container">
    //                 <h2>Detail Problem</h2>
    //                   <form class="form-horizontal">
    //                     <div class="card-body">
    //                       <div class="form-group row">
    //                           <label for="fname" class="col-sm-2 text-left col-form-label">No Ticket</label>
    //                           <div class="col-sm-6">
    //                             <input type="text" class="form-control" value="'.$hasil['no_ticket'].'">
    //                         </div>
    //                       </div>
    //                         <div class="form-group row">
    //                           <label for="fname" class="col-sm-2 text-left control-label col-form-label">Tanggal</label>
    //                           <div class="col-sm-6">
    //                             <input type="text" class="form-control value="'.$hasil['tgl_prob'].'">
    //                         </div>
    //                       </div>
    //                         <div class="form-group row">
    //                           <label for="fname" class="col-sm-2 text-left control-label col-form-label">Nama</label>
    //                           <div class="col-sm-6">
    //                             <input type="text" class="form-control value="'.$hasil['nama'].'">
    //                         </div>
    //                       </div>
    //                         <div class="form-group row">
    //                           <label for="fname" class="col-sm-2 text-left control-label col-form-label">Section</label>
    //                           <div class="col-sm-6">
    //                             <input type="text" class="form-control value="'.$hasil['section'].'">
    //                         </div>
    //                       </div>
    //                         <div class="form-group row">
    //                           <label for="fname" class="col-sm-2 text-left control-label col-form-label">Service</label>
    //                           <div class="col-sm-6">
    //                             <input type="text" class="form-control value="'.$hasil['service'].'">
    //                         </div>
    //                       </div>
    //                         <div class="form-group row">
    //                           <label for="fname" class="col-sm-2 text-left control-label col-form-label">Item</label>
    //                           <div class="col-sm-6">
    //                             <input type="text" class="form-control value="'.$hasil['item'].'">
    //                         </div>
    //                       </div>
    //                     </div>
    //                   </form>
    //               </div>

    //               </body>
    //               </html>';
    //   mail($to, $subject, $message, $headers);
    // }else{
    // echo "<script>alert('Email Failed Send');</script>";
    // }
    echo "<script>alert('Data Successful Send');</script>";
  }else {
    echo "<script>alert('Data Failed to Save');</script>";
  }
}
?>

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Problem</h3>
      </div>
    </div>
  </div>
    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
      <div class="card-body">
              <div class="form-group row">
                  <label for="fname" class="col-sm-3 text-left control-label col-form-label">Nama</label>
                  <div class="col-sm-6">
                      <select class="form-control" name="id_user">
                      <option selected disabled>Nama</option>
                      <?php 
                      $sql = mysqli_query($link, "SELECT * FROM tb_user");
                      while ($result = mysqli_fetch_assoc($sql)) {
                       echo '<option value ="'.$result['id_user'].'">'.$result['nama'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="fname" class="col-sm-3 text-left control-label col-form-label">Section</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="id_section">
                      <option selected disabled>Section</option>
                    <?php 
                    $sql = mysqli_query($link, "SELECT * FROM tb_section");
                      while ($result = mysqli_fetch_assoc($sql)) {
                       echo '<option value ="'.$result['id_section'].'">'.$result['section'].'</option>';
                      }
                    ?>
                  </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="fname" class="col-sm-3 text-left control-label col-form-label">Service</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="id_service">
                        <option selected disabled>Service</option>
                          <?php 
                          $sql = mysqli_query($link, "SELECT * FROM tb_service");
                            while ($result = mysqli_fetch_assoc($sql)) {
                             echo '<option value ="'.$result['id_service'].'">'.$result['name_service'].'</option>';
                            }
                          ?>
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="fname" class="col-sm-3 text-left control-label col-form-label">Problem</label>
                  <div class="col-sm-6">
                      <textarea type="text" name="problem" class="form-control" id="problem" placeholder="Problem"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="lname" class="col-sm-3 text-left control-label col-form-label">Item</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="id_item">
                        <option selected disabled>Item</option>
                          <?php 
                          $sql = mysqli_query($link, "SELECT * FROM tb_item");
                            while ($result = mysqli_fetch_assoc($sql)) {
                             echo '<option value ="'.$result['id_item'].'">'.$result['name_item'].'</option>';
                            }
                          ?>
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="file" class="col-sm-3 text-left control-label col-form-label">File</label>
                  <div class="col-md-6">
                      <input type="file" name="file" class="form-control">
                  </div>
              </div>  
              <div class="border-top">
                  <div class="card-body">
                      <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
                  </div>
              </div>
      </div>
    </form>
</div>