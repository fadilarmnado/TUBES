<?php
    class data{
        private $conn;

        public function __construct(){
            $server ="localhost";
            $user ="root";
            $pass ="";
            $db ="skuy";
            $this->conn=mysqli_connect($server,$user,$pass,$db);
        }
    
        public function edit_profile($nik,$nama,$alamat,$hp,$email,$foto){
            $nama_foto = $foto['name'];
            $tmp_foto = $foto['tmp_name'];
            $dir = '../gambar/';
            $target = $dir.$nama_foto;

            if (move_uploaded_file($tmp_foto, $target)) {
                $sql = "UPDATE data_user SET nama ='$nama',alamat ='$alamat', no_hp='$hp',foto='$target' WHERE nik ='$nik'";
                if ( mysqli_query($this->conn,$sql)) {
                    ?>
                    <script>
                        alert("Data Berhasil Diubah");
                        location="Profile.php";
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("Data gagal Diubah");
                        location="Profile.php";
                    </script>
                    <?php
                }      
            } 
        }
        public function sewa_kendaraan($harga_sewa, $tgl_sewa, $durasisewa,$id_kendaraan){
            session_start();
            $nik = $_SESSION['nik'];
            $total_sewa = (int) substr($durasisewa, 1,1) * $harga_sewa;

            $tgl_kembali = date("Y-m-d", strtotime($tgl_sewa.$durasisewa));
            $sql = "INSERT INTO sewa_kendaraan(tgl_sewa,durasi_sewa,tgl_kembali,total_sewa,nik,id_kendaraan) VALUES ('$tgl_sewa','$durasisewa','$tgl_kembali', '$total_sewa','$nik','$id_kendaraan')";
            $sql2 = "UPDATE data_kendaraan SET status = 0 WHERE id_kendaraan = '$id_kendaraan'";
            if ( mysqli_query($this->conn,$sql) && mysqli_query($this->conn,$sql2)) {
                ?>
                <script>
                    alert("Data Berhasil di input");
                    location="index.php?page=sewa";
                </script>
                <?php
            }
            else{ 
                ?>
                <script>
                    alert("Data gagal di input <?php echo mysqli_error($this->conn); ?>");
                    location="sewa.php";
                </script>
                <?php
            } 
        } 

        public function tampil_kendaraan() {
            $sql = mysqli_query($this->conn, "SELECT * FROM data_kendaraan");
            return $sql;
        }

        public function select_kendaraan() {
            $query = "SELECT * FROM data_kendaraan WHERE status = 1";
            $sql = mysqli_query($this->conn, $query);
            return $sql;
        }

        public function tampil_data($nik){
            $sql = mysqli_query($this->conn, "SELECT * FROM data_user WHERE nik = '$nik'");
            return $sql;
        }
        public function tampil(){
            $sql = mysqli_query($this->conn, "SELECT * FROM vpeminjaman");
            return $sql;
        }
    }
    $data = new data();
    if(isset($_GET['edit_profile'])){
        $data->edit_profile($_GET['edit_profile'],$_POST['nama'],$_POST['alamat'],$_POST['hp'],$_POST['email'], $_FILES['foto']);        
    }
    if(isset($_GET['sewa_kendaraan'])){
        $data->sewa_kendaraan($_POST['sewap'], $_POST['tgl_sewa'], $_POST['durasisewa'],$_POST['id_kendaraan']);
    }
?>   