<?php
include "../includes/conn.php";
if(isset($_POST["Submit"])){
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $level = $_POST["level"];
  $id_section = $_POST["id_section"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $sql = mysqli_query($link,"INSERT INTO tb_user(nama, email, level, id_section, password) VALUES ('$nama', '$email', '$level', '$id_section', '$password')");
  if ($sql) {
    echo "<script>alert('Account Successfully Registered');</script>";
    echo "<script>window.location='index.php';</script>";
  }else {
        echo "<script>alert('Account Failed To Registered');</script>";
  }
}
?>
<div class="container-fluid">
  <div class="header-body">
    <div class="row">
      <div class="col-md-8">
        <table class="table table-striped table-sm table-responsive" id="data-transaksi">
          <div class="row">
            <div class="col-md-6">
            <h2>USER</h2>
            </div>
            <div class="col-md-5 text-right">
              <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">ADD DATA</a>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                   <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title-default">Tambah User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-md-3 py-md-3">
                              <form role="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input class="form-control" name="nama" placeholder="Name" type="text">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" name="email" placeholder="Email" type="email">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-briefcase-24"></i></span>
                                    </div>
                                    <select class="form-control" name="level">
                                      <option selected disabled>Level</option>
                                      <option value="Admin">Admin</option>
                                      <option value="Manager">Manager</option>
                                      <option value="Staff">Staff</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-laptop"></i></span>
                                    </div>
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
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" name="password" placeholder="Password" type="password">
                                  </div>
                                </div>
                                <div class="text-center">
                                  <button  class="btn btn-primary mt-4" name="Submit" type="Submit">Create account</button>
                                </div>
                              </form>
                          </div>
                          </div>    
                        </div>            
                      </div>
                    </div>
                </div>
            </div>
          </div>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>E-mail</th>
              <th>Level</th>
              <th>Section</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM tb_user 
                      INNER JOIN tb_section ON tb_user.id_section = tb_section.id_section";
              $query = mysqli_query($link,$sql);
              while($hasil=mysqli_fetch_array($query)):
            ?>
            <tr>
              <td><?=$hasil['id_user'];?></td>
              <td><?=$hasil['nama'];?></td>
              <td><?=$hasil['email'];?></td>
              <td><?=$hasil['level'];?></td>
              <td><?=$hasil['section'];?></td>
              <td><a href="index.php?p=edit&No_Transaksi=<?php echo $hasil['No_Transaksi'];?>">
                <i class='fas fa-pencil-alt'></i>
              </a> 
                | <a href="javascript:hapusData('<?=$hasil['No_Transaksi'];?>')">
                  <i class='fas fa-trash' style="color: red;"></i>
                  </a>
              </td>
            </tr>
          <?php endwhile ?>
          </tbody>
        </table>
      </div>
    <div class="col-md-4">
      <table class="table table-striped table-sm table-responsive" id="data-transaksi">
        <div class="row">
            <div class="col-md-6">
            <h2>SERVICE</h2>
            </div>
            <div class="col-md-5 text-right">
              <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModalItem">ADD DATA</a>
                <!-- Modal -->
                <div class="modal fade" id="myModalItem" role="dialog">
                   <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title-default">Tambah Service</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-md-3 py-md-3">
                              <form role="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input class="form-control" name="nama" placeholder="Nama Service" type="text">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <select class="form-control">
                                      <option selected disabled>Type Service</option>
                                      <option value="Hardware"> Hardware </option>
                                      <option value="Software"> Software </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="text-center">
                                  <button  class="btn btn-primary mt-4" name="Submit" type="Submit">ADD SERVICE </button>
                                </div>
                              </form>
                          </div>
                          </div>    
                        </div>            
                      </div>
                    </div>
                </div>
            </div>
          </div>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Service</th>
            <th>Type Service</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM tb_service";
            $query = mysqli_query($link,$sql);
            while($hasil=mysqli_fetch_array($query)):
          ?>
          <tr>
            <td><?=$hasil['id_service'];?></td>
            <td><?=$hasil['name_service'];?></td>
            <td><?=$hasil['type_service'];?></td>
            <td><a href="index.php?p=edit&No_Transaksi=<?php echo $hasil['No_Transaksi'];?>">
              <i class='fas fa-pencil-alt'></i>
            </a> 
              | <a href="javascript:hapusData('<?=$hasil['No_Transaksi'];?>')">
                <i class='fas fa-trash' style="color: red;"></i>
                </a>
            </td>
          </tr>
        <?php endwhile ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <table class="table table-striped table-sm table-responsive" id="data-transaksi">
        <div class="row">
            <div class="col-md-6">
            <h2>ITEM</h2>
            </div>
            <div class="col-md-5 text-right">
              <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModalService">ADD DATA</a>
                <!-- Modal -->
                <div class="modal fade" id="myModalService" role="dialog">
                   <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title-default">Tambah Item</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-md-3 py-md-3">
                              <form role="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input class="form-control" name="nama" placeholder="Nama Item" type="text">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <select class="form-control">
                                      <option selected disabled>Type Item</option>
                                      <option value="Hardware"> Hardware </option>
                                      <option value="Software"> Software </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="text-center">
                                  <button  class="btn btn-primary mt-4" name="Submit" type="Submit">ADD ITEM</button>
                                </div>
                              </form>
                          </div>
                          </div>    
                        </div>            
                      </div>
                    </div>
                </div>
            </div>
          </div>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Item</th>
            <th>Type item</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM tb_item";
            $query = mysqli_query($link,$sql);
            while($hasil=mysqli_fetch_array($query)):
          ?>
          <tr>
            <td><?=$hasil['id_item'];?></td>
            <td><?=$hasil['name_item'];?></td>
            <td><?=$hasil['type_item'];?></td>
            <td><a href="index.php?p=edit&No_Transaksi=<?php echo $hasil['No_Transaksi'];?>">
              <i class='fas fa-pencil-alt'></i>
            </a> 
              | <a href="javascript:hapusData('<?=$hasil['No_Transaksi'];?>')">
                <i class='fas fa-trash' style="color: red;"></i>
                </a>
            </td>
          </tr>
        <?php endwhile ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-3">
      <table class="table table-striped table-sm table-responsive" id="data-transaksi">
        <div class="row">
            <div class="col-md-6">
            <h2>SECTION</h2>
            </div>
            <div class="col-md-5 text-right">
              <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModalSection">ADD DATA</a>
                <!-- Modal -->
                <div class="modal fade" id="myModalSection" role="dialog">
                   <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title-default">Tambah Section</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-md-3 py-md-3">
                              <form role="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input class="form-control" name="nama" placeholder="Nama Section" type="text">
                                  </div>
                                </div>
                                <div class="text-center">
                                  <button  class="btn btn-primary mt-4" name="Submit" type="Submit">ADD Section</button>
                                </div>
                              </form>
                          </div>
                          </div>    
                        </div>            
                      </div>
                    </div>
                </div>
            </div>
          </div>
        <thead>
          <tr>
            <th>ID</th>
            <th>Section</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM tb_section";
            $query = mysqli_query($link,$sql);
            while($hasil=mysqli_fetch_array($query)):
          ?>
          <tr>
            <td><?=$hasil['id_section'];?></td>
            <td><?=$hasil['section'];?></td>
            <td><a href="index.php?p=edit&No_Transaksi=<?php echo $hasil['No_Transaksi'];?>">
              <i class='fas fa-pencil-alt'></i>
            </a> 
              | <a href="javascript:hapusData('<?=$hasil['No_Transaksi'];?>')">
                <i class='fas fa-trash' style="color: red;"></i>
                </a>
            </td>
          </tr>
        <?php endwhile ?>
        </tbody>
      </table>
    </div>
  <div class="col-md-5">
    <table class="table table-striped table-sm table-responsive" id="data-transaksi">
      <div class="row">
            <div class="col-md-6">
            <h2>REQUEST</h2>
            </div>
            <div class="col-md-5 text-right">
              <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModalRequest">ADD DATA</a>
                <!-- Modal -->
                <div class="modal fade" id="myModalRequest" role="dialog">
                   <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title-default">Tambah Request</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-md-3 py-md-3">
                              <form role="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input class="form-control" name="nama" placeholder="Nama Request" type="text">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <select class="form-control">
                                      <option selected disabled>Type Request</option>
                                      <option value="Hardware"> Hardware </option>
                                      <option value="Software"> Software </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="text-center">
                                  <button  class="btn btn-primary mt-4" name="Submit" type="Submit">ADD REQUEST </button>
                                </div>
                              </form>
                          </div>
                          </div>    
                        </div>            
                      </div>
                    </div>
                </div>
            </div>
          </div>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Request</th>
        <th>Type Request</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM tb_kind_req";
        $query = mysqli_query($link,$sql);
        while($hasil=mysqli_fetch_array($query)):
      ?>
      <tr>
        <td><?=$hasil['id_request'];?></td>
        <td><?=$hasil['name_request'];?></td>
        <td><?=$hasil['type_request'];?></td>
        <td><a href="index.php?p=edit&No_Transaksi=<?php echo $hasil['No_Transaksi'];?>">
          <i class='fas fa-pencil-alt'></i>
        </a> 
          | <a href="javascript:hapusData('<?=$hasil['No_Transaksi'];?>')">
            <i class='fas fa-trash' style="color: red;"></i>
            </a>
        </td>
      </tr>
    <?php endwhile ?>
    </tbody>
  </table>
    </div>
    </div>
  </div>
</div>