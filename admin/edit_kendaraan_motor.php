<?php
  require("proses_admin.php");
  $id_kendaraan = $_GET['id_kendaraan'];
  $result = $admin->tampil($id_kendaraan);
  $row = mysqli_fetch_assoc($result);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <title>Data Kendaraan Motor</title>
  </head>
  <body>
    <div class="container w-50">

    <h1 class="text-center">Data Kendaraan Motor</h1>
    <hr>
    <form class="" action="proses_admin.php?edit_kendaraan=motor" method="post">
      <div class="form-group">
        <label for="formGroupExampleInput">ID Kendaraan</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="id_kendaraan" value="<?php echo $row['id_kendaraan']; ?>" readonly>
      </div>
<!-- ============================================================================================================================ -->
      <div class="form-group">
        <label for="formGroupExampleInput2">Nama Kendaraan</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="nama_kendaraan" value="<?php echo $row['nama_kendaraan']; ?>">
      </div>
<!-- ============================================================================================================================ -->
      <div class="form-group">
        <label for="formGroupExampleInput2">Merk Kendaraan</label>
        <select class="custom-select" name="merk">
            <option value="Yamaha" <?php if ($row['merk'] == "Yamaha") {
              echo "selected";
            } ?>>Yamaha</option>
            <option value="Honda" <?php if ($row['merk'] == "Honda") {
              echo "selected";
            } ?>>Honda</option>
            <option value="Suzuki" <?php if ($row['merk'] == "Suzuki") {
              echo "selected";
            } ?>>Suzuki</option>
            <option value="Kawasaki" <?php if ($row['merk'] == "Kawasaki") {
              echo "selected";
            } ?>>Kawasaki</option>
            <option value="KTM" <?php if ($row['merk'] == "KTM") {
              echo "selected";
            } ?>>KTM</option>
          </select>
      </div>
      <!-- ============================================================================================================================ -->
      <div class="form-group">
        <label for="formGroupExampleInput2">Jenis Kendaraan</label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="radio" name="jenis_kendaraan" id="exampleRadios1" value="CUB" <?php if ($row['jenis_kendaraan'] == "CUB") {
            echo "checked";
          } ?>>
          <label class="form-check-label" for="exampleRadios1">CUB</label><br>
          <input class="form-check-input" type="radio" name="jenis_kendaraan" id="exampleRadios2" value="Skuter Matic" <?php if ($row['jenis_kendaraan'] == "Skuter Matic") {
            echo "checked";
          } ?>>
          <label class="form-check-label" for="exampleRadios2">Skuter Matic</label><br>
          <input class="form-check-input" type="radio" name="jenis_kendaraan" id="exampleRadios3" value="Sport" <?php if ($row['jenis_kendaraan'] == "Sport") {
            echo "checked";
          } ?>>
          <label class="form-check-label" for="exampleRadios3">Sport</label>
      </div>
      <!-- ============================================================================================================================ -->
      <div class="form-group">
        <label for="formGroupExampleInput2">Plat Nomor</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="plat_nomor" value="<?php echo $row['plat_nomor']; ?>">
      </div>
      <!-- ============================================================================================================================ -->
      <div class="form-group">
        <label for="formGroupExampleInput2">harga</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="harga" value="<?php echo $row['harga']; ?>">
      </div>
      <!-- ============================================================================================================================ -->
      <button type="submit" class="btn btn-success">Tambah Data</button>
</form>

</div>
  </body>
</html>
