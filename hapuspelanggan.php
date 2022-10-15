<?php

//masukkan file koneksi
include "koneksi.php";

//membaca variabel user id
$pelanggan_id=$_POST['pelanggan_id'];

//perintah sql
$sqlhapus="DELETE FROM tbl_pelanggan WHERE pelanggan_id='$pelanggan_id'";

//eksekusi
if(mysqli_query($koneksi,$sqlhapus)) {
    echo '<script>
        alert("Data telah dihapus");
    </script>
    <meta http-equiv="refresh" content="0,pelanggan.php">';
} else {
    echo '<script>
        alert("Data gagal dihapus");
    </script>
    <meta http-equiv="refresh" content="0,pelanggan.php">';
}