<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../pictures/" . $filename;

    $db = mysqli_connect("localhost", "root", "", "toko_roti");

    $nama_barang = htmlspecialchars($_POST["nama_barang"]);
    $berat_barang = htmlspecialchars($_POST["berat_barang"]);
    $harga_barang = htmlspecialchars($_POST["harga_barang"]);
    $deskripsi_barang = htmlspecialchars($_POST["deskripsi_barang"]);

    // Get all the submitted data from the form
    $sql = "INSERT INTO `tb_roti` (`id_brg`, `nama_brg`, `berat_brg`, `harga_brg`, `desc_brg`, `pict_brg`) VALUES (NULL, '$nama_barang', '$berat_barang', '$harga_barang', '$deskripsi_barang', '$filename')";


    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        .wadah {
            border-radius: 10px;
            position: absolute;
            margin-left: 35%;
            margin-top: 5%;
            width: 30%;
            height: auto;
            padding: 10px;
            background-color: wheat;
        }
    </style>
</head>

<body>
    <div class="wadah">
        <div id="content">
            <form method="POST" action="" enctype="multipart/form-data">
                <h4 style="text-align: center;">MASUKAN ROTI</h4>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">nama barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_barang" placeholder="nama barang" name="nama_barang">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class=col-sm-5 col-form-label">berat barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="berat_barang" placeholder="berat barang" name="berat_barang">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-5 col-form-label">harga barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga_barang" placeholder="harga barang" name="harga_barang">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-5 col-form-label">deskripsi barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsi_barang" placeholder="deskripsi barang" name="deskripsi_barang">
                    </div>
                </div>
                <div class="form-group">
                    <input class="" type="file" name="uploadfile" value="" />
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>