<?php
//memanggil koneksi
include "koneksi.php";

//bikin variabel
$pelanggan_id=$_POST['pelanggan_id'];
$kode_pelanggan=$_POST['kode_pelanggan'];
$nama_pelanggan=$_POST['nama_pelanggan'];
$alamat=$_POST['alamat'];

//proses simpan ke tabel database
    $sql="UPDATE tbl_pelanggan SET kode_pelanggan='$kode_pelanggan', nama_pelanggan='$nama_pelanggan', alamat='$alamat' WHERE pelanggan_id='$pelanggan_id'";
    if(mysqli_query($koneksi,$sql)) {
        echo '<script>
            alert("Data pelanggan telah diperbarui");
        </script>
        <meta http-equiv="refresh" content="0, pelanggan.php">';
    } else {
        echo '<script>
            alert("Gagal memperbarui data pelanggan");
        </script>
        <meta http-equiv="refresh" content="0, pelanggan.php">';
    }