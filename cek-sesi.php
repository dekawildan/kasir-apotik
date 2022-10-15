<?php
//memulai sesi
session_start();

//mengecek kondisi sesi atau autentikasi jika sesi tidak diatur
if(!isset($_SESSION['username'])) {
    header('location:login.php');
}