<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <title>Dashboard kendaraan</title>
  </head>
  <body>
    <div class="container-fluid">

    <table class="table table-hover text-center">
  <thead class="thead-dark">
    <h1>Data Kendaraan</h1> <hr>
    <tr>
      <th>ID KENDARAAN</th>
      <th>NAMA KENDARAAN</th>
      <th>MERK</th>
      <th>JENIS KENDARAAN</th>
      <th>PLAT NOMOR</th>
      <th>HARGA</th>
      <th width="10%" colspan=2>ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require("proses_admin.php");
    $result = $admin -> dashboard_kendaraan();
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td><?php echo $row['id_kendaraan']; ?></td>
      <td><?php echo $row['nama_kendaraan']; ?></td>
      <td><?php echo $row['merk']; ?></td>
      <td><?php echo $row['jenis_kendaraan']; ?></td>
      <td><?php echo $row['plat_nomor']; ?></td>
      <td><?php echo $row['harga']; ?></td>
      <td class="pr-1"><a href="<?php if (substr($row['id_kendaraan'], 0, 3) == "MTR") { echo "edit_kendaraan_motor.php"; } else { echo "edit_kendaraan_mobil.php"; } ?>?id_kendaraan=<?php echo $row['id_kendaraan']; ?>"><input type="button" class="btn btn-primary" value="Edit"></a></td>
      <td class="pl-1"><a href="proses_admin.php?delete_kendaraan=<?php echo $row['id_kendaraan']; ?>"><input type="button" class="btn btn-danger" value="hapus"></a></td>
    </tr>
    <?php
  }
    ?>
    </tbody>
  </table>
</div>
  </body>
</html>
