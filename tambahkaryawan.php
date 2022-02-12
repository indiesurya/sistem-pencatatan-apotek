<?php

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
if (isset($_POST["tambahkaryawan"])) {
    if (tambahkaryawan($_POST) > 0) {
        echo "<script>
        alert('Karyawan berhasil ditambahkan');
        </script>";
        header("Location: index.php?halaman=datakaryawan");
    } else {
        echo mysqli_error($conn);
    }
}
?>
<div class="halaman">
    <h1>Tambah Data</h1>
</div>
<div class="data">
    <form action="" method="POST" enctype="multipart/form-data">
        <table  height="10px">
            <tr>
                <td><label>Nama Lengkap</label></td>
                <td><input type="text" name="nama" placeholder="Nama lengkap..." required /></td>
            </tr>
            <tr>
                <td><label>Username</label></td>
                <td><input type="text" name="username" placeholder="Username..." required /></td>
            </tr>
            <tr>
                <td><label for="jabatan">Jabatan</label></td>
                <td><select name="jabatan" id="jabatan" required style="width: 171px;">
                        <option value="">-</option>
                        <option value="Kasir" required>Kasir</option>
                        <option value="Admin" required>Admin</option>
                        <option value="IT Maintenance" required>IT Maintenance</option>
                        <option value="Apoteker" required>Apoteker</option>
                    </select></td>
            </tr>
            <tr>
                <td><label>Email</label></td>
                <td><input type="email" name="email" placeholder="Your email..." required /></td>
            </tr>
            <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="password" placeholder="Passowrd..." required /></td>
            </tr>
            <td><label>Konfirmasi Password</label></td>
            <td><input type="password" name="copassword" placeholder="Konfirmasi Password..." required /></td>
            </tr>
            <tr>
                <td><label>No Handphone</label></td>
                <td><input type="number" name="handphone" placeholder="Handphone..." required /></td>
            </tr>
            <tr>
                <td><label>Alamat</label></td>
                <td><input type="text" name="alamat" placeholder="Alamat..." required /></td>
            </tr>
            <tr>
                <td><label>Jenis Kelamin</label></td>
                <td><label><input type="radio" name="jenis_kelamin" value="laki-laki" required /> Laki-laki</label>
                    <label><input type="radio" name="jenis_kelamin" value="perempuan" required /> Perempuan</label>
            </tr>
            <tr>
                <td><label for="agama">Agama</label></td>
                <td><select name="agama" id="agama" required style="width: 171px;">
                        <option value="">-</option>
                        <option value="Islam" required>Islam</option>
                        <option value="Kristen" required>Kristen</option>
                        <option value="Hindu" required>Hindu</option>
                        <option value="Budha" required>Budha</option>
                    </select></td>
            </tr>
            <tr>
                <td><label>Foto</label></td>
                <td><input type="file" name="foto" placeholder="foto..." required /></td>
            </tr>
            <tr>
                <td><button type="submit" name="tambahkaryawan">Tambah data</style=></button>
            </tr>
        </table>
    </form>
</div>