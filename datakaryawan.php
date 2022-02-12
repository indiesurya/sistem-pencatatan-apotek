<?php
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
$pegawai = query("SELECT * FROM users ");

if (isset($_POST["cari"])) {
    $pegawai = carikaryawan($_POST["keyword"]);
}
?>
<div class="halaman">
    <h1>Data Karyawan</h1>
</div>
<li>
    <form action="" method="post">
        <input class="label-cari" type="text" name="keyword" placeholder="masukan pencarian anda" autocomplete="off" autofocus>
        <button class="btncari" type="submit" name="cari">Cari</button>
    </form>
</li>
<div class="data">
    <table border="1" style="text-align : center;">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Lengkap</td>
                <td>Username</td>
                <td>Jabatan</td>
                <td>Email</td>
                <td>No Handphone</td>
                <td>Alamat</td>
                <td>Jenis Kelamin</td>
                <td>Agama</td>
                <td>Foto</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <?php $no = 1; ?>
        <?php foreach ($pegawai as $row) : ?>
        <tbody>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["username"]; ?></td>
                <td><?= $row["jabatan"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["handphone"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["jenis_kelamin"]; ?></td>
                <td><?= $row["agama"]; ?></td>
                <td><img src="assets/img/<?= $row["foto"]; ?>" style="height: 100px; width: 100px; vertical-align:middle;" alt="<?php echo $row['username'] ?>"></td>
                <td>
                    <a href="index.php?halaman=editkaryawan&id=<?php echo $row["id"]; ?>">Edit</a>
                    || <a href="index.php?halaman=hapuskaryawan&id=<?php echo $row["id"]; ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
        <?php $no++;endforeach; ?>
        </tbody>
    </table>
    <button><a href="index.php?halaman=tambahkaryawan">Tambah data</a></button>
</div>
</body>

</html>