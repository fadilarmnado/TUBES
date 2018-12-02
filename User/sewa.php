<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width-divice-width, initial-scale-1">
    <link rel="stylesheet" href="..\asset\css\bootstrap.min.css"/>
</head>
<body>
    <form action="proses.php?sewa_kendaraan=kendaraan" method="Post">
        <table>
            <div class="container">
                <div class="row w-50 m-auto">
                    <div class="col pt-3">
                        <h1 class="text-center">SEWA</h1>
                    <div class="form-group">
                        <label for="fornkendaraan">Nama Kendaraan</label>
                        <select name="id_kendaraan" id="fornkendaraan" class="form-control" onchange="changeValue(this.value);">
                            <option> -- Pilih Kendaraan -- </option>
                            <?php
                            require("proses.php");
                            $result = $data -> select_kendaraan();
                            $jsArray = "var data = new Array();\n";
                            while($row = mysqli_fetch_assoc($result)) {?>
                                <option value="<?php echo $row['id_kendaraan']; ?>"><?php echo $row['id_kendaraan']. " | " . $row['nama_kendaraan'] . " | " . $row['plat_nomor']; ?></option>
                            <?php 
                                $jsArray.="data['".$row['id_kendaraan']."']={harga:'".addslashes($row['harga'])."',harga1:'Rp. ".addslashes(number_format($row['harga']))."'};\n";
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="forSewap">Sewa Perhari</label>
                        <input type="hidden" id="harga_sewa" name="sewap" readonly>
                        <input type="text" id="forSewap" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fortglsewa">Tanggal Sewa</label>
                        <input type="date" class="form-control" id="fortglsewa" placeholder="Tanggal Sewa" name="tgl_sewa">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputdurasisewa">Durasi Sewa</label>
                      </div>
                      <select class="custom-select" id="inputdurasisewa" name="durasisewa">
                        <option selected>Choose...</option>
                        <option value="+1 day">1 Hari</option>
                        <option value="+3 day">3 Hari</option>
                        <option value="+5 day">5 Hari</option>
                        <option value="+7 day">7 Hari</option>
                      </select>
                    </div>
                    <div class="form-group text-center">   
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </div>
                    </div>
                </div>
            </div>
        </table>
    </form>
    <script type="text/javascript">  
        <?php echo $jsArray; ?>
        function changeValue(id){
            document.getElementById('harga_sewa').value = data[id].harga; 
            document.getElementById('forSewap').value = data[id].harga1; 
        };
  </script>
</body>
</html>