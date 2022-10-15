<?php
//memanggil koneksi
include "koneksi.php";

//bikin variabel
$kode_pelanggan=$_POST['kode_pelanggan'];
$nama_pelanggan=$_POST['nama_pelanggan'];
$alamat=$_POST['alamat'];

//proses simpan ke tabel database
    $sql="INSERT INTO tbl_pelanggan VALUES('','$kode_pelanggan','$nama_pelanggan','$alamat')";
    if(mysqli_query($koneksi,$sql)) {
        echo '<script>
            alert("Data pelanggan telah ditambahkan");
        </script>
        <meta http-equiv="refresh" content="0, pelanggan.php">';
    } else {
        echo '<script>
            alert("Gagal menambahkan data pelanggan");
        </script>
        <meta http-equiv="refresh" content="0, pelanggan.php">';
    }