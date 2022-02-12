<?php
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
if (isset($_POST["tambahobat"])) {
    var_dump($_POST["tambahobat"]);
    if (tambahobat($_POST) > 0) {
        echo "<script>
        alert('Karyawan berhasil ditambahkan');
        </script>";
        header("Location: index.php?halaman=dataobat");
    } else {
        echo mysqli_error($conn);
    }
}
?>
<div class="halaman">
    <h1>Tambah Data Obat</h1>
</div>
<div class="data">
    <form action="" method="POST">
        <input type="hidden" name="id" />
        <p>
            <label for="nama">Nama Obat :</label>
            <input type="text" name="nama" placeholder="Nama Obat..." required autocomplete="off" />
        </p>
        <p>
            <label for="kode">Kode Obat :</label>
            <input type="text" name="kode" placeholder="Kode Obat..." ? required autocomplete="off" />
        </p>
        <p>
            <label for="kategori">Kategori :</label>
            <select name="kategori" id="kategori" required autocomplete="off">
                <option value="">-</option>
                <option value="Tablet Bebas" required>Tablet Bebas</option>
                <option value="Sirup" required>Sirup</option>
                <option value="C" required>C</option>
                <option value="D" required>D</option>
            </select>
        </p>
        <p>
            <label for="produsen">Produsen :</label>
            <input type="text" name="produsen" placeholder="Produsen..." ? required autocomplete="off" />
        </p>
        <p>
            <label for="distributor">Distributor :</label>
            <input type="text" name="distributor" placeholder="Distributor..." ? required autocomplete="off" />
        </p>
        <p>
            <label for="satuan">Satuan :</label>
            <input type="text" name="satuan" placeholder="Satuan..." ? required autocomplete="off" />
        </p>
        <p>
            <label for="harga_beli">Harga Beli :</label>
            <input type="text" name="harga_beli" placeholder="Harga Beli..." ? required autocomplete="off" />
        </p>
        <p>
            <label for="harga_jual">Harga Jual :</label>
            <input type="text" name="harga_jual" placeholder="Harga Jual..." ? required autocomplete="off" />
        </p>
        <button type="submit" name="tambahobat">Tambah data</button>
    </form>
</div>