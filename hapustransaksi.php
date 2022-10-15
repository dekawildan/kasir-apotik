<?php

//masukkan file koneksi
include "koneksi.php";

//membaca variabel user id
$transaksi_id=$_POST['transaksi_id'];

//perintah sql
$sqlhapus="DELETE FROM tbl_transaksi WHERE transaksi_id='$transaksi_id'";

//eksekusi
if(mysqli_query($koneksi,$sqlhapus)) {
    echo '<script>
        alert("Data telah dihapus");
    </script>
    <meta http-equiv="refresh" content="0,transaksi.php">';
} else {
    echo '<script>
        alert("Data gagal dihapus");
    </script>
    <meta http-equiv="refresh" content="0,transaksi.php">';
}