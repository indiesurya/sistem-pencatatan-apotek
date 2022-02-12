<?php
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
$data = $_SESSION["user"];
?>
<div class="halaman">
    <h1>Profil</h1>
</div>
<div class="foto-profil">
    <img src="assets/img/<?php echo $data['foto']; ?>" alt="">
    <ul>
        <h1><?php echo $data["nama"]; ?></h1>
        <p style="text-align: justify;">Username gua di apotek ini yaitu <b><?php echo $data['username']; ?></b> sebagai <b><?php echo $data["jabatan"]; ?></b>. Gua tinggal di <b><?php echo $data["alamat"]; ?></b> dan kalau mau hubungi gua telepon di nomor <b><?php echo $data["handphone"]; ?></b> dan email <b><?php echo $data["email"]; ?></b>. Sebagai <?php echo $data["jenis_kelamin"]; ?> yang beriman, gua menggeluti ajaran agama <?php echo $data["agama"]; ?> dengan baik agar segala hal yang akan gua lakukan berjalan baik terutama dalam menjalankan tugas gua sebagai <?php echo $data["jabatan"]; ?> di Apotek Kubu Anyar ini berjalan baik.</p>
    </ul>

</div>