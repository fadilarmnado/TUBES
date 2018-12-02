<?php
    require("header.php");
    if (isset($_GET['page'])) {
        if ($_GET['page'] == "Profile") {
            require("Profile.php");
        }
        if ($_GET['page'] == "listkendaraan") {
            require("listkendaraan.php");
        }
        if ($_GET['page'] == "sewa") {
            require("sewa.php");
        }
        if($_GET['page'] == "EditProfile") {
            require("editprofile.php");
        }
        if($_GET['page'] == "view") {
            require("view.php");
        }
    }else {
        require("dashboard.php");
    }
    require("footer.php")
?>