<?php
    class skuy{
        private $conn;

        public function __construct(){
            $server="localhost";
            $user="root";
            $pass="";
            $db="skuy";
            $this->conn=mysqli_connect($server,$user,$pass,$db);
        }
// ==============================================================
        public function registrasi($nama,$nik,$username,$password,$confirmpass){
            if ($confirmpass == $password) {
                $sql = mysqli_query($this->conn, "INSERT INTO akun_user (username,password, akses) VALUES ('$username', md5('$password'), 'user')");

                $ambil_id = mysqli_query($this->conn, "SELECT id_user FROM akun_user WHERE username='$username' AND password=md5('$password')");
                $row = mysqli_fetch_assoc($ambil_id);
                $id_user = $row['id_user'];

                $user = mysqli_query($this->conn, "INSERT INTO data_user (nik, nama, id_user) VALUES ('$nik', '$nama', $id_user)");

                if ($sql && $user) {
                  ?>
                  <script>
                      alert("Registrasi Berhasil");
                      location="index.php";
                  </script>
                  <?php
                } else {
                  echo mysqli_error($this->conn);
                }
            }
            else {
              ?>
              <script>
                  alert("Confirm Password tidak sama dengan Password!");
                  location="register.php";
              </script>
              <?php
            }
        }
// ==================================================================
        public function login($username,$password){
            session_start();
            $sql=mysqli_query($this->conn,"SELECT * FROM vpengguna WHERE username='$username' AND password=md5('$password')");
            $row=mysqli_fetch_assoc($sql);
            if ($sql) {
              if ($row['akses'] == "admin") {
                $_SESSION['akses'] = $row['akses'];
                $_SESSION['login'] = "sukses";
                header("location: admin/dashboard.php");
              } else {
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['username'] = $username;
                $_SESSION['nik'] = $row['nik'];
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['akses'] = $row['akses'];
                $_SESSION['login'] = "sukses";
                header("location: user/dashboard.php");
              }
            }
            else{
                ?>
                <script>
                    alert("Akun tidak ditemukan");
                    location="index.php";
                </script>
                <?php
            }
        }
    }

    $skuy = new skuy();
    if (isset($_GET['registrasi'])) {
        $skuy -> registrasi($_POST['nama'],$_POST['nik'],$_POST['username'],$_POST['password'],$_POST['confirmpass']);
    }
// ======================================================================================================================
    if (isset($_GET['login'])) {
        $skuy -> login($_POST['username'],$_POST['password']);
    }
//=======================================================================================================================
?>
