<?php
require "connection.php";

$check = 0;

$data = query("SELECT * FROM tb_roti");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <title>product</title>
</head>

<body>

    <body>
        <div class="badan">
            <h2 class="title">TOKO ROTI CELIBI BAKERY</h2>

            <a href="index.php"><button type="button" class="btn btn-secondary">LOGOUT</button></a>
            <a href="tambah.php"><button type="button" class="btn btn-secondary">TAMBAH</button></a>
            <br><br>
            <?php foreach ($data as $a) : ?>
                <div class="list-produk"> <img src="../pictures/<?= $a["pict_brg"]; ?>" alt="<?= $a["pict_brg"]; ?>">
                    <h4><?= $a["nama_brg"]; ?></h4>
                    <h5><?= rupiah($a["harga_brg"]); ?></h5><a class="tombol tombol-beli" href="#">Beli</a>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
    </main>

</body>

</html>