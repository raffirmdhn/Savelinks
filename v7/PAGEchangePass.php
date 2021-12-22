<?php
session_start();
require "function.php";

// Mengecek SESSION sudah terbuat atau belum
if (isset($_SESSION['sesiLogin'])) {
    header("Location: index.php");
    exit;
}


// Mengecek tombol forget
if (isset($_POST['change'])) {

    if (changePass($_POST) > 0) {
        echo "<script>alert('Berhasil')</script>";
        header("Location: MAINlogin.php");
    } else {
        // echo "<script>alert('gagal')</script>";
        echo mysqli_error($con);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Pass Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&family=Maven+Pro&family=Montserrat&family=Nunito+Sans&family=Quicksand&family=Rubik+Mono+One&display=swap');
    </style>
    <link rel="stylesheet" href="css/login-register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <nav>
        <h1 style="font-size: 30px;">Savelinks.</h1>
        <span style="background-color: black; width: 100%; height: 2px; display: block;"></span>
    </nav>

    <div class="container">
        <main>
            <div class="row">
                <div class="leftSide" style="text-align:center;">
                    <img src="img/logo-homepage.png" width="250" style="margin-bottom: 10px;">
                    <h1>Savelinks Project</h1>
                    <p>website ini bertujuan untuk menyimpan url sehingga dapat memudahkan anda untuk membuka link yang diinginkan tanpa harus membuat url baru</p>
                </div>

                <div class="rightSide">
                    <form method="POST" action="" class="loginForm" autocomplete="off">
                        <!-- Menampilkan pesan error -->
                        <?php if (isset($_POST['error'])) : ?>
                            <p style="color: red;font-style:italic;font-size:15px;"><?= $_POST['error'] ?></p>
                        <?php endif; ?>

                        <div class="form-group new-pass">
                            <div class="new">
                                <label for="new-pass">New Password</label><br>
                                <input type="password" name="new-pass" id="new-pass" placeholder="your New Password" autofocus>
                                <div class="garis1"></div>
                            </div>

                            <div class="confirm" style="margin-bottom: 13px;">
                                <label for="confirm-new-pass">Confirm New Password</label><br>
                                <input type="password" name="confirm-new-pass" id="confirm-new-pass" placeholder="your New Password">
                                <div class="garis2"></div>
                            </div>
                        </div>

                        <!-- Cari -->
                        <div class="login-group login">
                            <button type="submit" name="change">Ubah</button>
                        </div>

                    </form>

                </div>
            </div>
        </main>
    </div>
</body>

</html>