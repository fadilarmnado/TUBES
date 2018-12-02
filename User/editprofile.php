<?php
session_start();
require("proses.php"); 
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
                <h1 class="text-center">Edit Profile</h1>
                <form action="proses.php?edit_profile=<?php echo $nik; ?>" method="Post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fornik">NIK</label>
                        <input type="text" class="form-control" id="fornik" placeholder="NIK" name="nik" pattern="\d*" maxlength="12" min="0" value="<?php echo $row['nik']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fornama">Nama</label>
                        <input type="text" class="form-control" id="fornama" name="nama" placeholder="Nama" maxlength="25" value="<?php echo $row['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="foralamat">Alamat</label>
                        <input type="Placeholder" class="form-control" id="foralamat" name="alamat" maxlength="100" placeholder="Alamat" value="<?php echo $row['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="forhp">No HP / Telephone</label>
                        <input type="text" class="form-control" id="forhp" name="hp" placeholder="No HP / Telephone" pattern="\d*" maxlength="10" min="0" value="<?php echo $row['no_hp']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="foremail">Email</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's Email" pattern="[a-z0-9._%+-]+@gmail.com" required name="email" value="<?php echo $row['email']; ?>">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">@example.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="forfoto">Foto</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="foto">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">   
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit"> <a href="dashboard.php" class="btn btn-success mr-2">Dashboard</a>
                        <br>
                        <a href="index.php?page=Profile" class="btn btn-success mt-2 mr-2">Profile</a>
                    </div>                            
                </form>
            </div>
        </div>
    </div>
</body>
</html>