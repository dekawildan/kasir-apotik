<?php

//masukkan file koneksi
include "koneksi.php";

//membaca variabel user id
$user_id=$_POST['user_id'];

//perintah sql
$sqlhapus="DELETE FROM tbl_login WHERE user_id='$user_id'";

//eksekusi
if(mysqli_query($koneksi,$sqlhapus)) {
    echo '<script>
        alert("Data telah dihapus");
    </script>
    <meta http-equiv="refresh" content="0,petugas.php">';
} else {
    echo '<script>
        alert("Data gagal dihapus");
    </script>
    <meta http-equiv="refresh" content="0,petugas.php">';
}