<?php

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$row = mysqli_fetch_assoc($result);
if (isset($_POST["ubahdatakaryawan"])) {
    if (ubahkaryawan($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diubah');
        </script>";
        header("Location: index.php?halaman=datakaryawan");
    } else {
        echo mysqli_error($conn);
    }
}
?>
<div class="halaman">
    <h1>Ubah Data</h1>
</div>
<div class="data">
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $row["id"] ?>" />
        <p>
            <label>Nama Lengkap :</label>
            <input type="text" name="nama" placeholder="Nama Lengkap..." value="<?php echo $row["nama"]; ?>" required />
        </p>
        <p>
            <label>Username :</label>
            <input disabled type="text" name="username" placeholder="Username..." value="<?php echo $row["username"]; ?>" required />
        </p>
        <p>
            <label for="jabatan">Jabatan :</label>
            <select name="jabatan" id="jabatan" required>
                <option value="<?php echo $row["jabatan"]; ?>"><?php echo $row["jabatan"]; ?></option>
                <option value="">-</option>
                <option value="Kasir" required>Kasir</option>
                <option value="Admin" required>Admin</option>
                <option value="IT Maintenance" required>IT Maintenance</option>
                <option value="Apoteker" required>Apoteker</option>
            </select>
        </p>
        <p>
            <label>Email :</label>
            <input type="email" name="email" placeholder="Your email..." value="<?php echo $row["email"]; ?>" required />
        </p>
        <p>
            <label>No Handphone :</label>
            <input type="number" name="handphone" placeholder="Handphone..." value="<?php echo $row["handphone"]; ?>" required />
        </p>
        <p>
            <label>Alamat :</label>
            <input type="text" name="alamat" placeholder="Alamat..." value="<?php echo $row["alamat"]; ?>" required />
        </p>
        <p>
            <label>Alamat Domisili :</label>
            <input type="text" name="domisili" placeholder="Alamat Domisili..." value="<?php echo $row["domisili"]; ?>" required />
        </p>
        <p>
            <label>Jenis kelamin :</label>
            <label><input type="radio" name="jenis_kelamin" value="laki-laki" required /> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="perempuan" required /> Perempuan</label>
        </p>
        <p>
            <label for="agama">Agama :</label>
            <select name="agama" id="agama" required>
                <option value="<?php echo $row["agama"]; ?>"><?php echo $row["agama"]; ?></option>
                <option value="">-</option>
                <option value="Islam" required>Islam</option>
                <option value="Kristen" required>Kristen</option>
                <option value="Hindu" required>Hindu</option>
                <option value="Budha" required>Budha</option>
            </select>
        </p>
        <p>
            <label>Foto :</label>
            <input type="text" name="foto" placeholder="foto..." required />
        </p>
        <button type="submit" name="ubahdatakaryawan">Ubah data</style=></button>
    </form>
</div>