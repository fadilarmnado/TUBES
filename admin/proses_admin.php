<?php
class admin{
  private $conn;
  function __construct(){
    $server="localhost";
    $user="root";
    $pass="";
    $db="skuy";
    $this->conn=mysqli_connect($server,$user,$pass,$db);
  }
  //=============================================================
  public function motor($id_kendaraan,$nama_kendaraan,$merk,$jenis_kendaraan,$plat_nomor,$harga){
    $sql =mysqli_query($this->conn, "INSERT INTO data_kendaraan(id_kendaraan,nama_kendaraan,merk,jenis_kendaraan,plat_nomor,harga, status)
            VALUES ('$id_kendaraan','$nama_kendaraan','$merk','$jenis_kendaraan','$plat_nomor','$harga', 1)") ;
    if ($sql) {
      ?>
      <script>
          alert("Tambah data berhasil");
          location="index.php?page=kendaraan";
      </script>
      <?php
    }else {
      echo mysqli_error($this->conn);
    }
  }
  //================================================================
  public function mobil($id_kendaraan,$nama_kendaraan,$merk,$jenis_kendaraan,$plat_nomor,$harga){
    $sql =mysqli_query($this->conn, "INSERT INTO data_kendaraan(id_kendaraan,nama_kendaraan,merk,jenis_kendaraan,plat_nomor,harga, status)
            VALUES ('$id_kendaraan','$nama_kendaraan','$merk','$jenis_kendaraan','$plat_nomor','$harga', 1)") ;
    if ($sql) {
      ?>
      <script>
          alert("Tambah data berhasil");
          location="index.php?page=kendaraan";
      </script>
      <?php
    }else {
      echo mysqli_error($this->conn);
    }
  }
  public function get_idMotor() {
    $db=mysqli_query($this->conn, "SELECT MAX(id_kendaraan) as maxId FROM data_kendaraan WHERE id_kendaraan LIKE 'MTR%'");
    $Arr=$db->fetch_assoc();
    $Kode=$Arr['maxId'];
    $noUrut=(int)substr($Kode, 4, 6);
    $noUrut++;
    $Char = "MTR";
    $newID = $Char . sprintf("%03s", $noUrut);
    return $newID;
  }
  public function get_idMobil() {
    $db=mysqli_query($this->conn, "SELECT MAX(id_kendaraan) as maxId FROM data_kendaraan WHERE id_kendaraan LIKE 'MBL%'");
    $Arr=$db->fetch_assoc();
    $Kode=$Arr['maxId'];
    $noUrut=(int)substr($Kode, 4, 6);
    $noUrut++;
    $Char = "MBL";
    $newID = $Char . sprintf("%03s", $noUrut);
    return $newID;
  }
  //===========================================================================================================
  public function dashboard_admin(){
    $sql = mysqli_query($this->conn,"SELECT * FROM vpeminjaman WHERE lunas = 0");
    return $sql;
  }
  public function dashboard_kendaraan(){
    $sql = mysqli_query($this->conn, "SELECT * FROM data_kendaraan");
    return $sql;
  }
  public function dashboard_motor(){
    $sql = mysqli_query($this->conn, "SELECT * FROM data_kendaraan WHERE id_kendaraan LIKE 'MTR%'");
    return $sql;
  }
  public function dashboard_mobil(){
    $sql = mysqli_query($this->conn, "SELECT * FROM data_kendaraan WHERE id_kendaraan LIKE 'MBL%'");
    return $sql;
  }
  public function dashboard_history(){
    $sql = mysqli_query($this->conn,"SELECT * FROM vpeminjaman WHERE lunas = 1");
    return $sql;
  }
  //=========================================================================================================
  public function tampil($id_kendaraan){
    $sql = mysqli_query($this->conn,"SELECT * FROM data_kendaraan WHERE id_kendaraan = '$id_kendaraan'");
    return $sql;
  }
  //===========================================================================================================
  public function edit_kendaraan($id_kendaraan,$nama_kendaraan,$merk,$jenis_kendaraan,$plat_nomor,$harga){
    $sql = "UPDATE data_kendaraan SET id_kendaraan='$id_kendaraan',nama_kendaraan='$nama_kendaraan',
            merk='$merk',jenis_kendaraan='$jenis_kendaraan',plat_nomor='$plat_nomor',harga='$harga' WHERE id_kendaraan = '$id_kendaraan'";
    if (mysqli_query($this->conn,$sql)) {
      ?>
      <script>
          alert("Data Berhasil Diubah");
          location="index.php?page=kendaraan";
      </script>
      <?php
  }else{
      ?>
      <script>
          alert("Data gagal Diubah");
          location="index.php?page=kendaraan";
      </script>
      <?php
    }
  }
  //==================================================================================================================
  public function delete_kendaraan($id_kendaraan){
    $sql =mysqli_query($this->conn, "DELETE FROM data_kendaraan  WHERE id_kendaraan = '$id_kendaraan'");
    if ($sql) {
      ?>
      <script>
          alert("Data Berhasil Diubah");
          location="index.php?page=kendaraan";
      </script>
      <?php
  }else{
      ?>
      <script>
          alert("Data gagal Diubah");
          location="index.php?page=kendaraan";
      </script>
      <?php
    }
  }
  //====================================================================================================================
  public function konfirmasi($id_sewa){
    $sql=mysqli_query($this->conn, "SELECT * FROM vpeminjaman WHERE id_sewa = '$id_sewa'");
    $row = mysqli_fetch_assoc($sql);
    $tgl_kembali = date("Y-m-d");
    $tgl_deadline = $row['tgl_kembali'];
    $tgl_kembali_create = date_create($tgl_kembali);
    $tgl_deadline_create = date_create($tgl_deadline);
    $selisih = (int) date_diff($tgl_deadline_create, $tgl_kembali_create) -> format("%a");
    $denda = 10000;
    if ($tgl_kembali > $tgl_deadline) {
      $totalDenda = $denda * $selisih;
      $query = mysqli_query($this->conn, "UPDATE sewa_kendaraan SET tgl_dikembalikan = '$tgl_kembali', denda = '$totalDenda' WHERE id_sewa = '$id_sewa'");
    } else {
      $totalDenda = 0;
      $query = mysqli_query($this->conn, "UPDATE sewa_kendaraan SET tgl_dikembalikan = '$tgl_kembali', denda = '$totalDenda', lunas = 1 WHERE id_sewa = '$id_sewa'");
    }
    if ($query) {
      ?>
      <script>
          alert("Berhasil konfirmasi data..");
          location="index.php";
      </script>
      <?php
    } else {
      echo mysqli_error($this->conn);
    }
  }
    public function bayar($id_sewa) {
      $sql = mysqli_query($this->conn, "UPDATE sewa_kendaraan SET lunas = 1 WHERE id_sewa = '$id_sewa'");
      if ($sql) {
        ?>
        <script>
            alert("Data berhasil di bayar..");
            location="index.php";
        </script>
        <?php
      } else {
        ?>
        <script>
            alert("Data gagal di bayar..!");
            location="index.php";
        </script>
        <?php
      }
    }
    public function list_user(){
      $sql = mysqli_query($this->conn,"SELECT * FROM data_user");
      return $sql;
    }
}

$admin = new admin();
if (isset($_GET['motor'])) {
  $admin -> motor($_POST['id_kendaraan'],$_POST['nama_kendaraan'],$_POST['merk'],$_POST['jenis_kendaraan'],$_POST['plat_nomor'],$_POST['harga']);
}
if (isset($_GET['mobil'])) {
  $admin -> mobil($_POST['id_kendaraan'],$_POST['nama_kendaraan'],$_POST['merk'],$_POST['jenis_kendaraan'],$_POST['plat_nomor'],$_POST['harga']);
}
if (isset($_GET['edit_kendaraan'])) {
  $admin-> edit_kendaraan($_POST['id_kendaraan'],$_POST['nama_kendaraan'],$_POST['merk'],$_POST['jenis_kendaraan'],$_POST['plat_nomor'],$_POST['harga']);
}
if (isset($_GET['delete_kendaraan'])) {
  $admin->delete_kendaraan($_GET['delete_kendaraan']);
}
if (isset($_GET['konfirmasi'])) {
  $admin-> konfirmasi($_GET['konfirmasi']);
}
if (isset($_GET['bayar'])) {
  $admin -> bayar($_GET['bayar']);
}
?>
