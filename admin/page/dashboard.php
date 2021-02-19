<?php
include "../includes/conn.php";
if (isset($_POST["Submit_User"])) {
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $level = $_POST["level"];
  $id_section = $_POST["id_section"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $sql = mysqli_query($link, "INSERT INTO tb_user(nama, email, level, id_section, password) VALUES ('$nama', '$email', '$level', '$id_section', '$password')");
  if ($sql) {
    echo "<script>alert('Account Successfully Registered');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Account Failed To Registered');</script>";
  }
} elseif (isset($_POST["Submit_Service"])) {
  $name_service = $_POST["name_service"];
  $type_service = $_POST["type_service"];
  $sql = mysqli_query($link, "INSERT INTO tb_service(name_service, type_service) VALUES ('$name_service', '$type_service')");
  if ($sql) {
    echo "<script>alert('Account Successfully Registered');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Account Failed To Registered');</script>";
  }
} elseif (isset($_POST["Submit_Request"])) {
  $name_request = $_POST["name_request"];
  $type_request = $_POST["type_request"];
  $sql = mysqli_query($link, "INSERT INTO tb_kind_req(name_request, type_request) VALUES ('$name_request', '$type_request')");
  if ($sql) {
    echo "<script>alert('Account Successfully Registered');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Account Failed To Registered');</script>";
  }
} elseif (isset($_POST["Submit_Section"])) {
  $section = $_POST["section"];
  $sql = mysqli_query($link, "INSERT INTO tb_section(section) VALUES ('$section')");
  if ($sql) {
    echo "<script>alert('Account Successfully Registered');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Account Failed To Registered');</script>";
  }
} elseif (isset($_POST["Submit_Item"])) {
  $name_item = $_POST["name_item"];
  $type_item = $_POST["type_item"];
  $sql = mysqli_query($link, "INSERT INTO tb_item(name_item, type_item) VALUES ('$name_item', '$type_item')");
  if ($sql) {
    echo "<script>alert('Account Successfully Registered');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
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
                                    echo '<option value ="' . $result['id_section'] . '">' . $result['section'] . '</option>';
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
                              <button class="btn btn-primary mt-4" name="Submit" type="Submit">Create account</button>
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
            $query = mysqli_query($link, $sql);
            while ($hasil = mysqli_fetch_array($query)) :
            ?>
              <tr>
                <td><?= $hasil['id_user']; ?></td>
                <td><?= $hasil['nama']; ?></td>
                <td><?= $hasil['email']; ?></td>
                <td><?= $hasil['level']; ?></td>
                <td><?= $hasil['section']; ?></td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#modal-form<?php echo $hasil['id_user']; ?>">
                    <i class='fas fa-pencil-alt' style="color: blue;"></i>
                  </a>
                  |
                  <a href="javascript:hapusData_user('<?= $hasil['id_user']; ?>')">
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
                                <input class="form-control" name="name_service" placeholder="Nama Service" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <select name="type_service" class="form-control">
                                  <option selected disabled>Type Service</option>
                                  <option value="Hardware"> Hardware </option>
                                  <option value="Software"> Software </option>
                                </select>
                              </div>
                            </div>
                            <div class="text-center">
                              <button class="btn btn-primary mt-4" name="Submit_Service" type="Submit">ADD SERVICE </button>
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
            $query = mysqli_query($link, $sql);
            while ($hasil = mysqli_fetch_array($query)) :
            ?>
              <tr>
                <td><?= $hasil['id_service']; ?></td>
                <td><?= $hasil['name_service']; ?></td>
                <td><?= $hasil['type_service']; ?></td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#modal-form-service<?php echo $hasil['id_service']; ?>">
                    <i class='fas fa-pencil-alt' style="color: blue;"></i>
                  </a>
                  |
                  <a href="javascript:hapusData_service('<?= $hasil['id_service']; ?>')">
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
                                <input class="form-control" name="name_item" placeholder="Nama Item" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <select name="type_item" class="form-control">
                                  <option selected disabled>Type Item</option>
                                  <option value="Hardware"> Hardware </option>
                                  <option value="Software"> Software </option>
                                </select>
                              </div>
                            </div>
                            <div class="text-center">
                              <button class="btn btn-primary mt-4" name="Submit_Item" type="Submit">ADD ITEM</button>
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
            $query = mysqli_query($link, $sql);
            while ($hasil = mysqli_fetch_array($query)) :
            ?>
              <tr>
                <td><?= $hasil['id_item']; ?></td>
                <td><?= $hasil['name_item']; ?></td>
                <td><?= $hasil['type_item']; ?></td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#modal-form-item<?php echo $hasil['id_item']; ?>">
                    <i class='fas fa-pencil-alt' style="color: blue;"></i>
                  </a>
                  |
                  <a href="javascript:hapusData_item('<?= $hasil['id_item']; ?>')">
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
                                <input class="form-control" name="section" placeholder="Nama Section" type="text">
                              </div>
                            </div>
                            <div class="text-center">
                              <button class="btn btn-primary mt-4" name="Submit_Section" type="Submit">ADD Section</button>
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
            $query = mysqli_query($link, $sql);
            while ($hasil = mysqli_fetch_array($query)) :
            ?>
              <tr>
                <td><?= $hasil['id_section']; ?></td>
                <td><?= $hasil['section']; ?></td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#modal-form-section<?php echo $hasil['id_section']; ?>">
                    <i class='fas fa-pencil-alt' style="color: blue;"></i>
                  </a>
                  |
                  <a href="javascript:hapusData_section('<?= $hasil['id_section']; ?>')">
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
                                <input class="form-control" name="name_request" placeholder="Nama Request" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <select name="type_request" class="form-control">
                                  <option selected disabled>Type Request</option>
                                  <option value="Hardware"> Hardware </option>
                                  <option value="Software"> Software </option>
                                </select>
                              </div>
                            </div>
                            <div class="text-center">
                              <button class="btn btn-primary mt-4" name="Submit_Request" type="Submit">ADD REQUEST </button>
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
            $query = mysqli_query($link, $sql);
            while ($hasil = mysqli_fetch_array($query)) :
            ?>
              <tr>
                <td><?= $hasil['id_request']; ?></td>
                <td><?= $hasil['name_request']; ?></td>
                <td><?= $hasil['type_request']; ?></td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#modal-form-request<?php echo $hasil['id_request']; ?>">
                    <i class='fas fa-pencil-alt' style="color: blue;"></i>
                  </a>
                  |
                  <a href="javascript:hapusData_kind_request('<?= $hasil['id_request']; ?>')">
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
<div class="row">
  <div class="col-sm-6">
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>SERVICE</h2>
        </div>
        <div class="panel-body"><iframe src="include/service.php" width="100%" height="300"></iframe></div>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>ITEM</h2>
        </div>
        <div class="panel-body"><iframe src="include/item.php" width="100%" height="300"></iframe></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>SECTION</h2>
        </div>
        <div class="panel-body"><iframe src="include/section.php" width="100%" height="300"></iframe></div>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>REQUEST</h2>
        </div>
        <div class="panel-body"><iframe src="include/request.php" width="100%" height="300"></iframe></div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Edit-->
<?php
if (isset($_POST["Edit"])) {
  $nama = $_POST['nama'];
  $id_user = $_POST['id_user'];
  $email = $_POST['email'];
  $level = $_POST['level'];
  $id_section = $_POST['id_section'];
  $sql = "SELECT * FROM tb_user 
                            INNER JOIN tb_section ON tb_user.id_section = tb_section.id_section
                            WHERE id_user = '$id_user'";
  $query = mysqli_query($link, $sql);
  $hasil = mysqli_fetch_array($query);
  if (empty($id_section)) {
    $id_section = $hasil['id_section'];
  } elseif (empty($level)) {
    $level = $hasil['level'];
  } elseif (empty($id_section) && empty($level)) {
    $id_section = $hasil['id_section'];
    $level = $hasil['level'];
  } else {
    $level = $_POST['level'];
    $id_section = $_POST['id_section'];
  }
  $sql = mysqli_query($link, "UPDATE tb_user SET id_section = '$id_section', nama = '$nama', email = '$email', level = '$level' WHERE id_user = '$id_user'");
  if ($sql) {
    echo "<script>alert('Data Saved Successfully');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Data Failed to Save');</script>";
  }
}
?>
<?php
$sql = "SELECT * FROM tb_user 
                          INNER JOIN tb_section ON tb_user.id_section = tb_section.id_section";
$query = mysqli_query($link, $sql);
while ($hasil = mysqli_fetch_array($query)) :
?>
  <div class="modal fade" id="modal-form<?php echo $hasil['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modal-title-default">Edit User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body p-0">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" method="POST" enctype="multipart/form-data">
                <input name="id_user" hidden value="<?php echo $hasil['id_user']; ?>">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" name="nama" value="<?php echo $hasil['nama']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" value="<?php echo $hasil['email']; ?>" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-briefcase-24"></i></span>
                    </div>
                    <select class="form-control" name="level">
                      <option selected disabled>Level</option>
                      <option value="admin">Admin</option>
                      <option value="manager">Manager</option>
                      <option value="staff">Staff</option>
                      <option value="petugas">Petugas</option>
                      <option value="engginer">Engginer</option>
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
                        echo '<option value ="' . $result['id_section'] . '">' . $result['section'] . '</option>';
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




<!-- Modal Edit-->
<?php
if (isset($_POST["Edit_item"])) {
  $name_item = $_POST['name_item'];
  $id_item = $_POST['id_item'];
  $type_item = $_POST['type_item'];
  $sql = "SELECT * FROM tb_item WHERE id_item = '$id_item'";
  $query = mysqli_query($link, $sql);
  $hasil = mysqli_fetch_array($query);
  if (empty($type_item)) {
    $type_item = $hasil['type_item'];
  }else {
    $type_item = $_POST['type_item'];
  }
  $sql = mysqli_query($link, "UPDATE tb_item SET name_item = '$name_item', type_item = '$type_item' WHERE id_item = '$id_item'");
  if ($sql) {
    echo "<script>alert('Data Saved Successfully');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Data Failed to Save');</script>";
  }
}
?>
<?php
$sql = "SELECT * FROM tb_item";
$query = mysqli_query($link, $sql);
while ($hasil = mysqli_fetch_array($query)) :
?>
  <div class="modal fade" id="modal-form-item<?php echo $hasil['id_item']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modal-title-default">Edit Item</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body p-0">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" method="POST" enctype="multipart/form-data">
              <input name="id_item" type="text" hidden value="<?php echo $hasil['id_item']; ?>">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" name="name_item" value="<?php echo $hasil['name_item']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <select name="type_item" class="form-control">
                      <option selected disabled>Type Item</option>
                      <option value="Hardware"> Hardware </option>
                      <option value="Software"> Software </option>
                    </select>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary mt-4" name="Edit_item" type="Submit">EDIT ITEM</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>


<!-- Modal Edit-->
<?php
if (isset($_POST["Edit_service"])) {
  $name_service = $_POST['name_service'];
  $id_service = $_POST['id_service'];
  $type_service = $_POST['type_service'];
  $sql = "SELECT * FROM tb_service WHERE id_service = '$id_service'";
  $query = mysqli_query($link, $sql);
  $hasil = mysqli_fetch_array($query);
  if (empty($type_service)) {
    $type_service = $hasil['type_service'];
  }else {
    $type_service = $_POST['type_service'];
  }
  $sql = mysqli_query($link, "UPDATE tb_service SET name_service = '$name_service', type_service = '$type_service' WHERE id_service = '$id_service'");
  if ($sql) {
    echo "<script>alert('Data Saved Successfully');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Data Failed to Save');</script>";
  }
}
?>
<?php
$sql = "SELECT * FROM tb_service";
$query = mysqli_query($link, $sql);
while ($hasil = mysqli_fetch_array($query)) :
?>
  <div class="modal fade" id="modal-form-service<?php echo $hasil['id_service']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modal-title-default">Edit service</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body p-0">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" method="POST" enctype="multipart/form-data">
              <input name="id_service" type="text" hidden value="<?php echo $hasil['id_service']; ?>">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" name="name_service" value="<?php echo $hasil['name_service']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <select name="type_service" class="form-control">
                      <option selected disabled>Type service</option>
                      <option value="Hardware"> Hardware </option>
                      <option value="Software"> Software </option>
                    </select>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary mt-4" name="Edit_service" type="Submit">EDIT service</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>

<!-- Modal Edit-->
<?php
if (isset($_POST["Edit_request"])) {
  $name_request = $_POST['name_request'];
  $id_request = $_POST['id_request'];
  $type_request = $_POST['type_request'];
  $sql = "SELECT * FROM tb_kind_req WHERE id_request = '$id_request'";
  $query = mysqli_query($link, $sql);
  $hasil = mysqli_fetch_array($query);
  if (empty($type_request)) {
    $type_request = $hasil['type_request'];
  }else {
    $type_request = $_POST['type_request'];
  }
  $sql = mysqli_query($link, "UPDATE tb_kind_req SET name_request = '$name_request', type_request = '$type_request' WHERE id_request = '$id_request'");
  if ($sql) {
    echo "<script>alert('Data Saved Successfully');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Data Failed to Save');</script>";
  }
}
?>
<?php
$sql = "SELECT * FROM tb_kind_req";
$query = mysqli_query($link, $sql);
while ($hasil = mysqli_fetch_array($query)) :
?>
  <div class="modal fade" id="modal-form-request<?php echo $hasil['id_request']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modal-title-default">Edit request</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body p-0">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" method="POST" enctype="multipart/form-data">
              <input name="id_request" type="text" hidden value="<?php echo $hasil['id_request']; ?>">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" name="name_request" value="<?php echo $hasil['name_request']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <select name="type_request" class="form-control">
                      <option selected disabled>Type request</option>
                      <option value="Hardware"> Hardware </option>
                      <option value="Software"> Software </option>
                    </select>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary mt-4" name="Edit_request" type="Submit">EDIT Request</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>


<!-- Modal Edit-->
<?php
if (isset($_POST["Edit_section"])) {
  $section = $_POST['section'];
  $id_section = $_POST['id_section'];
  $sql = mysqli_query($link, "UPDATE tb_section SET section = '$section' WHERE id_section = '$id_section'");
  if ($sql) {
    echo "<script>alert('Data Saved Successfully');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Data Failed to Save');</script>";
  }
}
?>
<?php
$sql = "SELECT * FROM tb_section";
$query = mysqli_query($link, $sql);
while ($hasil = mysqli_fetch_array($query)) :
?>
  <div class="modal fade" id="modal-form-section<?php echo $hasil['id_section']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modal-title-default">Edit section</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body p-0">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" method="POST" enctype="multipart/form-data">
              <input name="id_section" type="text" hidden value="<?php echo $hasil['id_section']; ?>">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" name="section" value="<?php echo $hasil['section']; ?>" type="text">
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary mt-4" name="Edit_section" type="Submit">EDIT SECTION</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>