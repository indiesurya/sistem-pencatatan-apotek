<?php

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM dataobat WHERE id = $id");
$row = mysqli_fetch_assoc($result);
if (isset($_POST["ubahdataobat"])) {
    if (ubahobat($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diubah');
        </script>";
        header("Location: index.php?halaman=dataobat");
    } else {
        echo mysqli_error($conn);
    }
}
?>
<div class="halaman">
    <h1>Ubah Data Obat</h1>
</div>
<div class="data">
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $row["id"] ?>" />
        <p>
            <label>Nama Obat :</label>
            <input type="text" name="nama" placeholder="Nama Obat..." value="<?php echo $row["nama"]; ?>" required />
        </p>
        <p>
            <label>Kode Obat :</label>
            <input disabled type="text" name="kode" placeholder="Kode Obat..." value="<?php echo $row["kode"]; ?>" required />
        </p>
        <p>
            <label for="kategori">Kategori :</label>
            <select name="kategori" id="kategori" required>
                <option value="<?php echo $row["kategori"]; ?>"><?php echo $row["kategori"]; ?></option>
                <option value="">-</option>
                <option value="Tablet Bebas" required>Tablet Bebas</option>
                <option value="Sirup" required>Tablet Bebas</option>
                <option value="C" required>C</option>
                <option value="D" required>D</option>
            </select>
        </p>
        <p>
            <label for="produsen">Produsen :</label>
            <input type="text" name="produsen" placeholder="Produsen..." value="<?php echo $row["produsen"]; ?>" required />
        </p>
        <p>
            <label for="distributor">Distributor :</label>
            <input type="text" name="distributor" placeholder="Distributor..." value="<?php echo $row["distributor"]; ?>" required />
        </p>
        <p>
            <label for="satuan">Satuan :</label>
            <input type="text" name="satuan" placeholder="Satuan..." value="<?php echo $row["satuan"]; ?>" required />
        </p>
        <p>
            <label for="harga_beli">Harga Beli :</label>
            <input type="text" name="harga_beli" placeholder="Harga Beli..." value="<?php echo $row["harga_beli"]; ?>" required />
        </p>
        <p>
            <label for="harga_jual">Harga Jual :</label>
            <input type="text" name="harga_jual" placeholder="Harga Jual..." value="<?php echo $row["harga_jual"]; ?>" required />
        </p>
        <button type="submit" name="ubahdataobat">Ubah data</style=></button>
    </form>
</div>