<?php
    session_start();
    if(isset($_SESSION['login'])){
        if ($_SESSION['akses'] == "admin") {
          header("Location: admin/dashboard.php");
        } else {
          header("Location: user/dashboard.php");
        }
    }
    if(isset($_GET['logout'])){
        session_destroy();
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <div class="row w-50 m-auto">
            <div class="col pt-3">
                <h1 class="text-center">Login</h1>
                <hr>
                <form action="proses.php?login=login" method="post">
                    <div class="form-group">
                        <label for="InputUsername">Username</label>
                        <input type="text" name="username" class="form-control" id="InputUsername" required>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="InputPassword" required>
                    </div>
                    <div class="form-group text-center">
                      <input type="submit" class="btn btn-primary" name="submit" value="Login"> <input type="reset" class="btn btn-danger" value="Reset">
                      <br>
                      <a href="registrasi.php" class="btn btn-success mt-2">Buat Akun</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
