  <div class="card">
  <!-- Card header -->
    <div class="card-header"><h3 class="mb-0">Data Request</h3></div>
    <div class="container">
      <a class="btn btn-md btn-success" href="report_request.php" target="_blank">Print</a>
      <div class="table-responsive py-4">
        <table class="table table-flush" id="data-request">
          <thead class="thead-light">
              <tr>
                  <th>Detail</th>
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
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
              $id_section = $_SESSION['id_section'];
              $sql = "SELECT * FROM tb_request 
                      INNER JOIN tb_user ON tb_request.id_user = tb_user.id_user
                      INNER JOIN tb_section ON tb_user.id_section = tb_section.id_section
                      INNER JOIN tb_kind_req ON tb_kind_req.id_request = tb_request.id_request
                      INNER JOIN tb_item ON tb_request.id_item = tb_item.id_item
                      WHERE tb_request.id_section = $id_section";
              $query = mysqli_query($link,$sql);
              while($hasil=mysqli_fetch_array($query)):
          ?>
            <tr>
              <td>
                <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $hasil['no_ticket']; ?>">Detail</a>
                <!-- Modal -->
                <div class="modal fade" id="myModal<?php echo $hasil['no_ticket']; ?>" role="dialog">
                   <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title-default">Detail</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body p-0">
                          <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                              <form role="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                      <label for="fname" class="col-sm-3 text-left control-label col-form-label">No Ticket</label>
                                      <div class="col-sm-6">
                                         <input class="form-control" readonly type="text" value="<?= $hasil['no_ticket'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fname" class="col-sm-3 text-left control-label col-form-label">Tanggal</label>
                                      <div class="col-sm-6">
                                         <input class="form-control" readonly type="text" value="<?= $hasil['tgl_req'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fname" class="col-sm-3 text-left control-label col-form-label">Nama</label>
                                      <div class="col-sm-6">
                                         <input class="form-control" readonly type="text" value="<?= $hasil['nama'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fname" class="col-sm-3 text-left control-label col-form-label">Section</label>
                                      <div class="col-sm-6">
                                        <input class="form-control" readonly type="text" value="<?= $hasil['section'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fname" class="col-sm-3 text-left control-label col-form-label">Request</label>
                                      <div class="col-sm-6">
                                        <input class="form-control" readonly type="text" value="<?= $hasil['name_request'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fname" class="col-sm-3 text-left control-label col-form-label">Description</label>
                                      <div class="col-sm-6">
                                          <textarea readonly type="text" name="description" class="form-control" id="description" placeholder="Description"><?=$hasil['description'];?></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="lname" class="col-sm-3 text-left control-label col-form-label">Item</label>
                                      <div class="col-sm-6">
                                        <input class="form-control" readonly type="text" value="<?= $hasil['name_item'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="lname" class="col-sm-3 text-left control-label col-form-label">Item</label>
                                      <div class="col-sm-6">
                                        <input class="form-control" readonly type="text" value="<?= $hasil['email'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="lname" class="col-sm-3 text-left control-label col-form-label">Status</label>
                                      <div class="col-sm-6">
                                        <input class="form-control" readonly type="text" value="<?php 
                                                                                                if ($hasil['status'] < 1) {
                                                                                                 echo "Draft";
                                                                                                }elseif($hasil['status'] == 1){
                                                                                                  echo "Approved";
                                                                                                }elseif($hasil['status'] == 2){
                                                                                                  echo "Proccessed";
                                                                                                }elseif($hasil['status'] == 3){
                                                                                                  echo "Taking Over";
                                                                                                }elseif($hasil['status'] == 4){
                                                                                                  echo "Finish";
                                                                                                }else{
                                                                                                  echo "Rejected";
                                                                                                }
                                                                                               ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="file" class="col-sm-3 text-left control-label col-form-label">File</label>
                                      <div class="col-md-6">
                                          <a download="<?=$hasil['attachment'];?>" href="upload/problem/<?=$hasil['attachment'];?>"><?=$hasil['attachment'];?></a>
                                      </div>
                                  </div>    
                                  <div class="text-center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-form<?php echo $hasil['no_ticket']; ?>">Edit</button>
                                  </div>
                              </form>
                            </div>
                          </div>    
                        </div>            
                      </div>
                    </div>
                </div>
              </td>
              <td><?=$hasil['no_ticket'];?></td>
              <td><?=$hasil['tgl_req'];?></td>
              <td><?=$hasil['nama'];?></td>
              <td><?=$hasil['section'];?></td>
              <td><?=$hasil['name_request'];?></td>
              <td><?=$hasil['description'];?></td>
              <td><?=$hasil['name_item'];?></td>
              <td><a download="<?=$hasil['attachment'];?>" href="../upload/request/<?=$hasil['attachment'];?>"><?=$hasil['attachment'];?></a></td>
              <td><?=$hasil['email'];?></td>
              <td><?php 
                if ($hasil['status'] < 1) {
                 echo "Draft";
                }elseif($hasil['status'] == 1){
                  echo "Approved";
                }elseif($hasil['status'] == 2){
                  echo "Proccessed";
                }elseif($hasil['status'] == 3){
                  echo "Taking Over";
                }elseif($hasil['status'] == 4){
                  echo "Finish";
                }else{
                  echo "Rejected";
                }
               ?></td>
               <td>
                  <a href="#" type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-form<?php echo $hasil['no_ticket']; ?>">
                  <i class='fas fa-pencil-alt' style="color: gray;"></i>
                  </a>
               </td>
            </tr>
              <?php endwhile; ?>
          </tbody>
      </table>
    </div>
    </div>
  </div>

  <!-- Modal Edit-->
<?php
$section = $_SESSION['id_section'];
$result = mysqli_fetch_array($query);
if(isset($_POST["Edit"])){  
  $description = $_POST['description'];
  $no_ticket = $_POST['no_ticket'];
  $sql = "SELECT * FROM tb_request 
          INNER JOIN tb_user ON tb_request.id_user = tb_user.id_user
          INNER JOIN tb_section ON tb_user.id_section = tb_section.id_section
          INNER JOIN tb_kind_req ON tb_kind_req.id_request = tb_request.id_request
          INNER JOIN tb_item ON tb_request.id_item = tb_item.id_item
          WHERE no_ticket = '$no_ticket'";
  $query = mysqli_query($link,$sql);
  $hasil = mysqli_fetch_array($query);
  if (empty($id_request) && empty($id_item)) {
    $id_item = $hasil['id_item'];
    $id_request = $hasil['id_request'];
  }else{
    $id_request = $_POST['id_request'];
    $id_item = $_POST['id_item'];
  }
  $sql = mysqli_query($link,"UPDATE tb_request SET id_request = '$id_request', description = '$description', id_item = '$id_item' WHERE no_ticket = '$no_ticket'");
  if ($sql) {
      echo "<script>alert('Data Saved Successfully');</script>";
      echo "<script>window.location='?p=history_request';</script>";
    } else {
      echo "<script>alert('Data Failed to Save');</script>";
  }
}
?>
<?php
    $sql = "SELECT * FROM tb_request 
            INNER JOIN tb_user ON tb_request.id_user = tb_user.id_user
            INNER JOIN tb_section ON tb_user.id_section = tb_section.id_section
            INNER JOIN tb_kind_req ON tb_kind_req.id_request = tb_request.id_request
            INNER JOIN tb_item ON tb_request.id_item = tb_item.id_item";
    $query = mysqli_query($link,$sql);
    while($hasil=mysqli_fetch_array($query)):
?>
<div class="modal fade" id="modal-form<?php echo $hasil['no_ticket']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="modal-title-default">Edit Request</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" method="POST" enctype="multipart/form-data">
              <input hidden name="no_ticket" value="<?php echo $hasil['no_ticket']; ?>">
             <div class="form-group row">
                  <label for="fname" class="col-sm-3 text-left control-label col-form-label">Request</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="id_request">
                        <option selected disabled><?php echo $hasil['name_request']; ?></option>
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
                      <textarea type="text" name="description" class="form-control" id="description" placeholder="Description"><?php echo $hasil['description']; ?></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="lname" class="col-sm-3 text-left control-label col-form-label">Item</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="id_item">
                        <option selected disabled><?php echo $hasil['name_item']; ?></option>
                          <?php 
                          $sql = mysqli_query($link, "SELECT * FROM tb_item");
                            while ($result = mysqli_fetch_assoc($sql)) {
                             echo '<option value ="'.$result['id_item'].'">'.$result['name_item'].'</option>';
                            }
                          ?>
                    </select>
                  </div>
              </div>
                <div class="text-center">
                    <button type="Submit" class="btn btn-primary my-4" name="Edit" data-toggle="modal" data-target="#modal-form1">Edit</button>
                </div>
            </form>
          </div>
        </div>    
      </div>            
    </div>
  </div>
</div>
<?php endwhile; ?>