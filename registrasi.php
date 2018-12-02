<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrasi Akun</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row pt-lg-5">
            <div class="col shadow bg-white col-lg-5 p-0 m-lg-auto rounded">
                <div class="bg-success p-2">
                  <h1 class="text-center text-light">Registrasi</h1>
                </div>
                <form action="proses.php?registrasi=regis" method="post">
                  <div class="px-3 pt-2">
                      <div class="form-group">
                          <label for="InputNamaLengkap">Nama Lengkap</label>
                          <input type="text" name="nama" id="InputNamaLengkap" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="InputNIK">NIK</label>
                          <input type="text" name="nik" id="InputNIK" class="form-control"  required>
                      </div>
                      <div class="form-group">
                          <label for="InputUsername">Username</label>
                          <input type="text" name="username" id="InputUsername" class="form-control"  required>
                      </div>
                      <div class="form-group">
                          <label for="InputPassword">Password</label>
                          <input type="password" name="password" id="InputPassword" class="form-control"  required>
                      </div>
                      <div class="form-group">
                          <label for="KonfirmasiPassword">Konfirmasi Password</label>
                          <input type="password" name="confirmpass" id="KonfirmasiPassword" class="form-control"  required>
                      </div>
                      <div class="form-group text-center">
                        <input type="submit" value="Submit" class="btn btn-primary" name="submit"> <input type="reset" class="btn btn-danger" value="Reset">
                        <br>
                        <a href="index.php" class="btn btn-success mt-2">Halaman Login</a>
                      </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
