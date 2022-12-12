<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "toko_roti";

$conn = mysqli_connect($servername, $username, $password, $databasename);

if (!$conn) {
    die("Koneksi gagal! " . mysqli_connect_error());
} else {
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function rupiah($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function checkDataLogin($data)
{
    global $conn;

    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);

    $sql = "select * from tb_user where email_user = '$email' and password_user = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    return $count;
}


function checkDataRegister($data)
{
    global $conn;

    $username = htmlspecialchars($data["userName"]);
    $password = htmlspecialchars($data["password"]);

    $sql = "select * from tb_user where username_user = '$username' and password_user = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    return $count;
}

function tambah($data)
{
    global $conn;

    //ambil data dari tiap elemen
    $username = htmlspecialchars($data["userName"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $noHp = htmlspecialchars($data["phone"]);

    // query insert data
    $query = "INSERT INTO `tb_user` (`id_pengunjung`, `username_user`, `email_user`, `password_user`, `noHp_user`) VALUES (NULL, '$username', '$email', '$password', '$noHp')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_roti($data)
{
    global $conn;

    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $berat_barang = htmlspecialchars($data["berat_barang"]);
    $harga_barang = htmlspecialchars($data["harga_barang"]);
    $deskripsi_barang = htmlspecialchars($data["deskripsi_barang"]);

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../pictures/" . $filename;

    $sql = "INSERT INTO `tb_roti` (`id_brg`, `nama_brg`, `berat_brg`, `harga_brg`, `desc_brg`, `pict_brg`) VALUES (NULL, '$nama_barang', '$berat_barang', '$harga_barang', '$deskripsi_barang', '$filename')";

    // Get all the submitted data from the form

    // Execute query
    mysqli_query($conn, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}
