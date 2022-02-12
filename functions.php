<?php 
$conn = mysqli_connect("localhost", "root", "", "apt");

function registrasi($data){
    global $conn;

    $nama = $data ["nama"];
    $username = strtolower(stripslashes($data["username"]));
    $email =  $data ["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $copassword = mysqli_real_escape_string($conn, $data["copassword"]);
    $handphone = $data ["handphone"];
    $alamat = $data ["alamat"];
    $domisili = $data ["domisili"];
    $jenis_kelamin = $data ["jenis_kelamin"];
    $agama = $data ["agama"];
    $foto = $data ["foto"];

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username ='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username telah terdaftar');
        </script>";
        return false;
    }

    if ($password !== $copassword){
        echo "<script>
        alert ('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_query($conn, "INSERT INTO users VALUES
                ('', '$nama','$username','$email','$password','$handphone','$alamat','$domisili','$jenis_kelamin','$agama','$foto') ");  
                
    return mysqli_affected_rows ($conn);
}

function tambahkaryawan($data){
    global $conn;

    $nama = $data ["nama"];
    $username = strtolower(stripslashes($data["username"]));
    $email =  $data ["email"];
    $jabatan = $data ["jabatan"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $copassword = mysqli_real_escape_string($conn, $data["copassword"]);
    $handphone = $data ["handphone"];
    $alamat = $data ["alamat"];
    $domisili = $data ["domisili"];
    $jenis_kelamin = $data ["jenis_kelamin"];
    $agama = $data ["agama"];
    $foto = upload(); 
    
    if (!foto){
        return false;
    }

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username ='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username telah terdaftar');
        </script>";
        return false;
    }

    if ($password !== $copassword){
        echo "<script>
        alert ('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users VALUES
                ('', '$nama','$username','$jabatan','$email','$password','$handphone','$alamat','$domisili','$jenis_kelamin','$agama','$foto') ");  
                
    return mysqli_affected_rows ($conn);
}

function ubahkaryawan($data){
    global $conn;

    $id = $data["id"];
    $nama = $data ["nama"];
    $email =  $data ["email"];
    $jabatan = $data ["jabatan"];
    $handphone = $data ["handphone"];
    $alamat = $data ["alamat"];
    $domisili = $data ["domisili"];
    $jenis_kelamin = $data ["jenis_kelamin"];
    $agama = $data ["agama"];
    $foto = $data ["foto"];

    mysqli_query($conn, "UPDATE users SET
                nama = '$nama',
                email = '$email',
                jabatan = '$jabatan',
                handphone = '$handphone',
                alamat = '$alamat',
                domisili ='$domisili',
                jenis_kelamin = '$jenis_kelamin',
                agama = '$agama',
                foto = '$foto'
                WHERE id = $id
    ");

    return mysqli_affected_rows($conn);
}
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function carikaryawan($keyword){
    $query = "SELECT * FROM users WHERE
    nama LIKE '%$keyword%' OR
    username LIKE '%$keyword%' OR
    jabatan LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    handphone LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    domisili LIKE '%$keyword%' OR
    jenis_kelamin LIKE '%$keyword%' OR
    agama LIKE '%$keyword%'";
    return query($query);
}
function hapuskaryawan($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function tambahobat($data){
    global $conn;

    $nama = $data ["nama"];
    $kode = $data["kode"];
    $kategori=  $data ["kategori"];
    $produsen = $data ["produsen"];
    $distributor = $data["distributor"];
    $satuan = $data["satuan"];
    $harga_beli = $data ["harga_beli"];
    $harga_jual = $data ["harga_jual"];

    //cek nama obat sudah ada atau belum
    $result = mysqli_query($conn, "SELECT nama FROM dataobat WHERE nama ='$nama'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Obat telah tersedia');
        </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO dataobat VALUES
                ('', '$nama','$kode','$kategori','$produsen','$distributor','$satuan','$harga_beli','$harga_jual')");  
                
    return mysqli_affected_rows ($conn);
}
function ubahobat($data){
    global $conn;
    $id = $data["id"];
    $nama = $data ["nama"];
    $kategori=  $data ["kategori"];
    $produsen = $data ["produsen"];
    $distributor = $data["distributor"];
    $satuan = $data["satuan"];
    $harga_beli = $data ["harga_beli"];
    $harga_jual = $data ["harga_jual"];

    mysqli_query($conn, "UPDATE dataobat SET
                nama = '$nama',
                kategori = '$kategori',
                produsen = '$produsen',
                distributor = '$distributor',
                satuan = '$satuan',
                harga_beli ='$harga_beli',
                harga_jual = '$harga_jual'
                WHERE id = $id
    ");

    return mysqli_affected_rows($conn);
}

function hapusobat ($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM dataobat WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function cariobat($keyword){
    $query = "SELECT * FROM dataobat WHERE
    nama LIKE '%$keyword%' OR
    kategori LIKE '%$keyword%' OR
    produsen LIKE '%$keyword%' OR
    distributor LIKE '%$keyword%' OR
    satuan LIKE '%$keyword%' OR
    harga_beli LIKE '%$keyword%' OR
    harga_jual LIKE '%$keyword%'";
    return query($query);
}

function upload(){
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if($error === 4){
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }
    $ekstensiValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiValid)){
        echo "<script>alert('Upload Gambar!!');</script>";
    }
    if($ukuranFile > 1000000){
        echo "<script>Maksimal ukuran gambar yaitu 1 MB</script>";
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    
    return $namaFileBaru;
}
?> 

