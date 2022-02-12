<?php
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
$dataobat = query("SELECT * FROM dataobat ");

if (isset($_POST["cari"])) {
    $dataobat = cariobat($_POST["keyword"]);
}
?>
<div class="halaman">
    <h1>Satuan</h1>
</div>
<li>
    <form action="" method="post">
        <input class="label-cari" type="text" name="keyword" placeholder="masukan pencarian anda" autocomplete="off">
        <button class="btncari" type="submit" name="cari">Cari</button>
    </form>
</li>
<div class="data">
    <table border="1" style="text-align:center;">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Obat</td>
                <td>Kode Obat</td>
                <td>Kategori</td>
                <td>Produsen</td>
                <td>Distributor</td>
                <td>Satuan</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <?php $no = 1; ?>
        <?php foreach ($dataobat as $row) : ?>
            <tbody>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["kode"]; ?></td>
                    <td><?= $row["kategori"]; ?></td>
                    <td><?= $row["produsen"]; ?></td>
                    <td><?= $row["distributor"]; ?></td>
                    <td><?= $row["satuan"]; ?> </td>
                    <td><?= $row["harga_beli"]; ?></td>
                    <td><?= $row["harga_jual"]; ?></td>
                    <td>
                        <a href="index.php?halaman=editobat&id=<?php echo $row["id"]; ?>">Edit</a>
                        || <a href="index.php?halaman=hapusobat&id=<?php echo $row["id"]; ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php $no++;
        endforeach; ?>
            </tbody>
    </table>
    <button><a href="index.php?halaman=tambahobat">Tambah data</a></button>
</div>
</body>

</html>