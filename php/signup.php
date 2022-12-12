<?php

require "connection.php";

$a = 0;

if (isset($_POST["btn-register"])) {

    $pass = $_POST["password"];
    $conpass = $_POST["conPass"];

    if ($pass != $conpass) {
        $a = 1;
    } else if (checkDataRegister($_POST) > 0) {
        $a = 2;
    } else {
        if (tambah($_POST) > 0) {
            echo "<script>
            alert('Berhasil Registrasi');
            document.location.href = 'login.php';
            </script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/signup.css">
    <title>Register</title>
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <img src="../pictures/logo_web.png" alt="logo">
        </div>
        <div class="text-center mt-4 name">
            CELIBI BAKERY
        </div>
        <form class="p-3 mt-3" action="" method="POST" autocomplete="off">
            <!-- username -->
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="userName" id="userName" placeholder="Username">
            </div>
            <!-- email -->
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>
            <!-- phone -->
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="phone" name="phone" id="phone" placeholder="phone">
            </div>
            <!-- password -->
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <!-- confirm password -->
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="conPass" id="conPass" placeholder="Confirm Password">
            </div>
            <?php if ($a === 1) : ?>
                <p class="text-danger">*password not same!</p>
            <?php elseif ($a === 2) : ?>
                <p class="text-danger">*username already exist!</p>
            <?php endif; ?>
            <button class="btn mt-3" name="btn-register">Sign up</button>
        </form>
        <div class="text-center fs-6">
            <a href="login.php">Login</a>
        </div>
    </div>
</body>

</html>