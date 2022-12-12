<?php
require "connection.php";
$a = false;
session_start();

if (isset($_POST["btn-login"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];
    if ($email === "admin@gmail.com" && $pass === "admin") {
        echo "<script>
        alert('Berhasil Login ADMIN!');
        document.location.href = 'orderList.php';
        </script>";
    } else {
        if (checkDataLogin($_POST) != 0) {
            $_SESSION["email"] = $email;
            echo "<script>
            alert('Berhasil Login');
            document.location.href = 'e-commerce.php';
            </script>";
        } else {
            $a = true;
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
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>LOGIN</title>
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
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn mt-3" name="btn-login">Login</button>
        </form>
        <div class="text-center fs-6">
            <?php if ($a === true) : ?>
                <p class="text-danger">*password/username salah!</p>
            <?php endif; ?>
            <a href="signup.php">Sign up</a>
        </div>
    </div>
</body>

</html>