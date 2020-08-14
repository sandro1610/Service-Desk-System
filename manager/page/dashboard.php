<div class="container-fluid">
  <div class="header-body">
    <table class="table table-striped table-sm table-responsive" id="data-transaksi">
    <thead>
      <tr>
        <th>No</th>
        <th>Password</th>
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
        <td><?=$hasil['password'];?></td>
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
</div>