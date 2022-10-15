<?php

//memulai sesi
session_start();

//syntax memanggil file
include "koneksi.php";

//autentikasi username dan password
if(empty($_POST['username']) || empty($_POST['password'])) {
    echo '<script>
        alert("Username atau password harap diisi");
    </script>
    <meta http-equiv="refresh" content="0, login.php">';
} else {
    //merekam data dari form
    $user=$_POST['username'];
    $password=$_POST['password'];

    //memproses akun dengan sql
    $sqlcek=mysqli_query($koneksi, "SELECT * FROM tbl_login WHERE username='$user' AND password='$password'");
    if(mysqli_num_rows($sqlcek) > 0) {
        $_SESSION['username'] = $user;
        header('location:index.php');
    } else {
        echo '<script>
        alert("Username atau password tidak terdaftar");
    </script>
    <meta http-equiv="refresh" content="0, login.php">';
    }
}