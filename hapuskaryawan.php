<?php
if(!isset($_SESSION["user"])){
    header("Location: login.php");
    exit;
}
$id = $_GET["id"];

    if(hapuskaryawan($id)>0){
        echo"<script> alert('data berhasil dihapus');
        document.location.href = 'index.php?halaman=datakaryawan';
        </script>";
    }
    else{
        echo"<script> alert('data gagal dihapus');
        document.location.href = 'index.php?halaman=datakaryawan';
        </script>";
    }

?>