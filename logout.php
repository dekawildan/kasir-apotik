<?php
//memulai sesi
session_start();

//menghapus semua sesi
session_destroy();
header('location:login.php');