<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View</title>
    <meta name="viewport" content="width-divice-width, initial-scale-1">
    <link rel="stylesheet" href="..\asset\css\bootstrap.min.css"/>
    <script src="main.js"></script>
</head>
<body>
<table class="table">
  <thead class="thead-light">
    <tr align="center">
      <th scope="col">No Sewa</th>
      <th scope="col">Kendaraan</th>
      <th scope="col">Biaya/Hari</th>
      <th scope="col">Tanggal Sewa</th>
      <th scope="col">Tanggal Deadline</th>
      <th scope="col">Tanggal Di kembalikan</th>
      <th scope="col">Denda</th>
      <th scope="col">Total</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $no =1;
    require("proses.php");
    $result = $data -> tampil();
    while($row = mysqli_fetch_assoc($result)){
  ?>
    <tr align="center">
      <td><?php echo $no;?></td>
      <td><?php echo $row['nama_kendaraan']?></td>
      <td><?php echo  "Rp ". number_format($row['harga']);?></td>
      <td><?php echo $row['tgl_sewa']?></td> 
      <td><?php echo $row['tgl_kembali']?></td>
      <td><?php echo $row['tgl_dikembalikan']?></td>
      <td><?php echo $row['denda']?></td>
      <td><?php echo "Rp ". number_format($row['total_sewa']); ?></td>
      <td><?php echo $row['keterangan']?></td>
    </tr>
    <?php
        $no++;
      }
    ?>
  </tbody>
</table>
</body>
</html>