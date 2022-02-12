<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';
$data = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek Kubu Anyar</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>

<body>
    <div class="main-container">
        <div class="sidebar">
            <div class="role">
                <a href="index.php">
                    <h1><?php echo $data["jabatan"]; ?></h1>
                </a>
            </div>
            <div class="fitur">
                <li class="kolom"><a class="fas fa-user-circle" href="index.php?halaman=profil"> Profil</a></li>
                <li class="kolom"><a class="fas fa-id-badge" href="index.php?halaman=datakaryawan"> Data Karyawan</a></li>
                <li class="kolom"><a class="fas fa-database" href="index.php?halaman=dataobat"> Data Obat</a></li>
                <li class="kolom"><a class="fas fa-clipboard-list" href="index.php?halaman=kategori"> Kategori</a></li>
                <li class="kolom"><a class="fas fa-shapes" href="index.php?halaman=satuan"> Satuan</a></li>
                <li class="kolom"><a class="fas fa-address-book" href="index.php?halaman=supplier"> Supplier</a></li>
            </div>
        </div>
        <div class="content">
            <div class="nav">
                <div class="dropdown">
                    <button class="ldropdown"><?php echo $data["username"];?></button>
                    <div class="dropdown-content">
                        <a href="index.php?halaman=profil" class="fas fa-user-circle"> Profil</a>
                        <a href="logout.php" class="fa fa-sign-out-alt"> Logout</a>
                    </div>
                </div>
            <div class="bodycontent">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "profil") {
                        include 'profil.php';
                    } else if ($_GET['halaman'] == "datakaryawan") {
                        include 'datakaryawan.php';
                    } else if ($_GET['halaman'] == "dataobat") {
                        include 'dataobat.php';
                    } else if ($_GET['halaman'] == "editkaryawan") {
                        include 'editkaryawan.php';
                    } else if ($_GET['halaman'] == "tambahkaryawan") {
                        include 'tambahkaryawan.php';
                    } else if ($_GET['halaman'] == "editobat") {
                        include 'editobat.php';
                    } else if ($_GET['halaman'] == "tambahobat") {
                        include 'tambahobat.php';
                    } else if ($_GET['halaman'] == "hapusobat") {
                        include 'hapusobat.php';
                    } else if ($_GET['halaman'] == "hapuskaryawan") {
                        include 'hapuskaryawan.php';
                    } else if ($_GET['halaman'] == "kategori") {
                        include 'kategori.php';
                    } else if ($_GET['halaman'] == "satuan") {
                        include 'satuan.php';
                    } else if ($_GET['halaman'] == "supplier") {
                        include 'supplier.php';
                    } else {
                        include 'home.php';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>