<?php
require 'functions.php';

if (isset($_POST["register"]) ){
    if (registrasi($_POST)>0){
        echo "<script>
        alert('User baru berhasil ditambahkan');
        </script>";
    }
    else {
        echo mysqli_error($conn);
    }
}
?>

<body>
    <div class="data">
        <form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
        <legend>Registrasi</legend>
        <p>
            <label>Nama Lengkap :</label>
            <input type="text" name="nama" placeholder="Nama lengkap..." required/>
        </p>
        <p>
            <label>Username :</label>
            <input type="text" name="username" placeholder="Username..." required/>
        </p>
        <p>
            <label>Email :</label>
            <input type="email" name="email" placeholder="Your email..." required/>
        </p>
        <p>
            <label>Password :</label>
            <input type="password" name="password" placeholder="Passowrd..." required/>
        </p>
        <p?>
            <label>Konfirmasi Password :</label>
            <input type="password" name="copassword" placeholder="Konfirmasi Password..." required/>
        </p>
        <p>
            <label>No Handphone :</label>
            <input type="number" name="handphone" placeholder="Handphone..." required/>
        </p>
        <p>
            <label>Alamat :</label>
            <input type="text" name="alamat" placeholder="Alamat..." required/>
        </p>
        <p>
            <label>Jenis kelamin :</label>
            <label><input type="radio" name="jenis_kelamin" value="laki-laki" required/> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="perempuan" required/> Perempuan</label>
        </p>
        <p>
            <label for="agama">Agama :</label>
            <select name="agama" id="agama" required>
                <option value="">-</option>
                <option value="islam" required>Islam</option>
                <option value="kristen" required>Kristen</option>
                <option value="hindu" required>Hindu</option>
                <option value="budha" required>Budha</option>
            </select>
        </p>
        <p>
            <label>Foto :</label>
            <input type="file" name="foto" placeholder="foto..." required/>
        </p>
        <p>
            <input type="submit" name="register" value="Daftar" />
        </p>
        </fieldset>
    </form>
    </div>
</body>
</html>