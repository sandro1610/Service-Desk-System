<?php
  $email = $_SESSION['email'];
  $query = mysqli_query($link,"SELECT * FROM tb_user 
                               INNER JOIN tb_section ON tb_user.id_section = tb_section.id_section WHERE email = '$email' ");
  while($hasil=mysqli_fetch_array($query)):     
?>
      <div class="col-md-12 mb-5 mb-xl-0">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-form">Edit Profile</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input type="text" id="name" class="form-control form-control-alternative" placeholder="Name" value="<?php echo $hasil['nama']; ?>" disabled="true">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email Address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="Email Address" value="<?php echo $hasil['email']; ?>" disabled="true">
                      </div>
                    </div>
                  </div> 
                </div>
              </form>
            </div>
          </div>
      </div>
      <?php endwhile ?>

<!-- Modal -->
<?php
$id_user = $_SESSION['id_user'];
$query = mysqli_query($link,"SELECT * FROM tb_user WHERE email = '$email' ");
$result = mysqli_fetch_array($query);
if(isset($_POST["Edit"])){
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $new_pwd = $_POST['new_pwd'];
  $new_pwd2 = $_POST['new_pwd2'];
  $password = $_POST['password'];
  $pwdCheck = password_verify($password, $result['password']);
      if ($pwdCheck == false) {
        echo "<script>window.location='?p=profile';</script>";
        exit();
      }elseif ($pwdCheck == true) {
          if ($new_pwd != $new_pwd2) {
          echo "<script>alert('Your new password is not same');</script>";
          }else if ($new_pwd === $new_pwd2) {
            $new_pwd = password_hash($_POST["new_pwd"], PASSWORD_DEFAULT);
            $sql = mysqli_query($link,"UPDATE tb_user SET nama = '$nama', email = '$email', password = '$new_pwd' WHERE id_user = '$id_user' " );
            echo "<script>alert('Data conversion was successful !!!');</script>";
          }
      }else{
        header("Location: ../index.php?error=wrongPassword");
        exit();
      }
}
?>

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="modal-title-default">Edit Profile</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="nama" class="form-control" id="fname" placeholder="Name" value="<?php  echo $result['nama']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="email" class="form-control" id="fname" placeholder="Email Address" value="<?php  echo $result['email']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control" id="fname" placeholder="Old Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" name="new_pwd" class="form-control" id="fname" placeholder="New Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" name="new_pwd2" class="form-control" id="fname" placeholder="Repeat Password">
                    </div>
                </div>
                <div class="text-center">
                    <button type="Submit" class="btn btn-primary my-4" name="Edit" data-toggle="modal" data-target="#modal-form">Submit</button>
                </div>
            </form>
          </div>
        </div>    
      </div>            
    </div>
  </div>
</div>
