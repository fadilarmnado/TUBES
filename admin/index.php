<?php
    require("header.php");
    if (isset($_GET['page'])) {
        if ($_GET['page'] == "mobil") {
            require("kendaraan_mobil.php");
        }
        if ($_GET['page'] == "motor") {
            require("kendaraan_motor.php");
        }
        if ($_GET['page'] == "kendaraan") {
            require("dashboard_kendaraan.php");
        }
        if($_GET['page'] == "edit_kendaraan_mobil") {
            require("edit_kendaraan_mobil.php");
        }
        if($_GET['page'] == "edit_kendaraan_motor") {
            require("edit_kendaraan_motor.php");
        }
        if($_GET['page'] == "history") {
            require("history.php");
        }
        if($_GET['page'] == "user") {
            require("list_user.php");
        }
    }else {
        require("dashboard.php");
    }
    require("footer.php")
?>