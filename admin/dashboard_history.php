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
    <h1 class="text-center">Sejarah Peminjaman</h1> <hr>
    <tr>
      <th>NIK</th>
      <th>NAMA</th>
      <th>ID Kendaraan</th>
      <th>Tanggal Sewa</th>
      <th>Tanggal Kembali</th>
      <th>Tanggal Dikembalikan</th>
      <th>Denda</th>
      <th>Lunas</th>
      <th>Total Sewa</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require("proses_admin.php");
    $result = $admin -> dashboard_history();
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
      <td><?php echo $row['lunas']; ?></td>
      <td><?php echo $row['total_sewa']; ?></td>

    </tr>
    <?php
  }
    ?>
    </tbody>
  </table>
</div>
  </body>
</html>
