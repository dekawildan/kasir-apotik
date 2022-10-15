<?php

//masukkan file koneksi
include "koneksi.php";

//membaca variabel user id
$obat_id=$_POST['obat_id'];

//perintah sql
$sqlhapus="DELETE FROM tbl_obat WHERE obat_id='$obat_id'";

//eksekusi
if(mysqli_query($koneksi,$sqlhapus)) {
    echo '<script>
        alert("Data telah dihapus");
    </script>
    <meta http-equiv="refresh" content="0,obat.php">';
} else {
    echo '<script>
        alert("Data gagal dihapus");
    </script>
    <meta http-equiv="refresh" content="0,obat.php">';
}