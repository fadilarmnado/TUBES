<div class="container-fluid">

    <table class="table table-hover text-center">
  <thead class="thead-dark">
    <h1>List Pengguna</h1> <hr>
    <tr>
      <th>NIK</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>No. Hp/Telepon</th>
      <th>Email</th>
      <th width="10%">Foto</th>
    </tr>
  </thead>
  <tbody>
    <?php
        require("proses_admin.php");
        $result = $admin -> list_user();
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td><?php echo $row['nik']; ?></td>
      <td><?php echo $row['nama']; ?></td>
      <td><?php echo $row['alamat']; ?></td>
      <td><?php echo $row['no_hp']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><img width="100%" src="<?php echo $row['foto']; ?>"></td>
    </tr>
    <?php
  }
    ?>
    </tbody>
  </table>
</div>