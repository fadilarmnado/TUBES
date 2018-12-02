<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <title>Dashboard Admin</title>
  </head>
  <body>
    <div class="container-fluid">

    <table class="table table-hover text-center">
  <thead class="thead-dark">
    <h1 class="text-center">Data Peminjaman Kendaraan</h1> <hr>
    <tr>
      <th>NIK</th>
      <th>NAMA</th>
      <th>ID Kendaraan</th>
      <th>Tanggal Sewa</th>
      <th>Tanggal Kembali</th>
      <th>Tanggal Dikembalikan</th>
      <th>Denda</th>
      <th>Total Sewa</th>
      <th>total banget</th>
      <th>Keterangan</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require("proses_admin.php");
    $result = $admin -> dashboard_admin();
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td><?php echo $row['nik']; ?></td>
      <td><?php echo $row['nama']; ?></td>
      <td><?php echo $row['id_kendaraan']; ?></td>
      <td><?php echo $row['tgl_sewa']; ?></td>
      <td><?php echo $row['tgl_kembali']; ?></td>
      <td><?php if($row['tgl_dikembalikan'] != "0000-00-00") { echo $row['tgl_dikembalikan']; } else { echo "-"; } ?></td>
      <td><?php echo $row['denda']; ?></td>
      <td><?php echo "Rp " . number_format($row['total_sewa']); ?></td>
      <td><?php echo "Rp " . number_format($row['total_sewa'] + $row['denda']); ?></td>
      <td><?php echo $row['keterangan']; ?></td>
      <td>
        <?php if($row['tgl_dikembalikan'] == "0000-00-00") { ?>
          <a href="proses_admin.php?konfirmasi=<?php echo $row['id_sewa']; ?>" class="btn btn-success">Konfirmasi</a>
        <?php } else { ?>
          <a href="proses_admin.php?bayar=<?php echo $row['id_sewa']; ?>" class="btn btn-info">Bayar Denda</a>
        <?php } ?>
      </td>
    </tr>
    <?php
  }
    ?>
    </tbody>
  </table>
</div>
  </body>
</html>
