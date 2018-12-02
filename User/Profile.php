<?php
    session_start();
    require("proses.php");
    $data = new data(); 
    $nik = $_SESSION['nik'];
    $result = $data->tampil_data($nik);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width-divice-width, initial-scale-1">
    <link rel="stylesheet" href="..\asset\css\bootstrap.min.css"/>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row w-50 m-auto">
            <div class="col pt-3">
                <h1 class="text-center">Profile</h1>
                <div class="form-group">
                    <label for="fornik">NIK</label>
                    <input type="text" class="form-control" id="fornik" placeholder="NIK" name="nik" pattern="\d*" maxlength="10" min="0" readonly value="<?php echo $_SESSION['nik']; ?>">
                </div>
                <div class="form-group">
                    <label for="fornama">Nama</label>
                    <input type="text" class="form-control" id="fornama" name="nama" placeholder="Nama" value="<?php echo $_SESSION['nama']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="foralamat">Alamat</label>
                    <input type="Placeholder" class="form-control" id="foralamat" name="alamat" placeholder="Alamat" value="<?php echo $row['alamat']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="forhp">No HP / Telephone</label>
                    <input type="text" class="form-control" id="forhp" name="hp" placeholder="No HP / Telephone" value="<?php echo $row['no_hp']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="forhp">Email</label>
                    <input type="text" class="form-control" id="forhp" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                </div>
            </div>
        </div>
        <div class="form-group text-center">   
            <a href="index.php?page=EditProfile" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</body>
</html>