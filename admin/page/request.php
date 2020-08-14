<?php
$section = $_SESSION['id_section'];
if(isset($_POST["Submit"])){
    $email = $_SESSION['email'];
    $tgl_req = date('Y-m-d');
    $id_user = $_POST['id_user'];
    $id_section = $_POST['id_section'];
    $id_request = $_POST['id_request'];
    $description = $_POST['description'];
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
          $fileDestination = 'upload/request/'.$fileNewName;
          move_uploaded_file($fileTmp_name, $fileDestination);
          $sql = mysqli_query($link,"INSERT INTO tb_request (no_ticket, tgl_req, email, id_user, id_section, status, id_request, description, id_item, attachment, v_key)
            VALUES ('',
                    '$tgl_req',
                    '$email', 
                    '$id_user',
                    '$id_section',
                    '1',
                    '$id_request',
                    '$description',
                    '$id_item',
                    '$fileNewName',
                    '$v_key')" );
          if ($sql) {
            echo "<script>alert('Data Saved Successfully');</script>";
            echo "<script>window.location='?p=history_request';</script>";
          } else {
            echo "<script>alert('Data Failed to Save');</script>";
          }
        }else{
          echo "<script>alert('Your file is too big !!');</script>";
        }
      }else{
        echo "<script>alert('Thare is an error in your file !!');</script>";
      }
    }else{
      echo "<script>alert('Sorry, only pdf, doc, docx, xls, xlsx files are allowed');</script>";
    }
}
?>

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Request</h3>
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
                  <label for="fname" class="col-sm-3 text-left control-label col-form-label">Request</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="id_request">
                        <option selected disabled>Request</option>
                          <?php 
                          $sql = mysqli_query($link, "SELECT * FROM tb_kind_req");
                            while ($result = mysqli_fetch_assoc($sql)) {
                             echo '<option value ="'.$result['id_request'].'">'.$result['name_request'].'</option>';
                            }
                          ?>
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="fname" class="col-sm-3 text-left control-label col-form-label">Description</label>
                  <div class="col-sm-6">
                      <textarea type="text" name="description" class="form-control" id="description" placeholder="Description"></textarea>
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