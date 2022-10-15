<?php
//memanggil koneksi
include "koneksi.php";

//bikin variabel
$kode_obat=$_POST['kode_obat'];
$nama_obat=$_POST['nama_obat'];
$harga_obat=$_POST['harga_obat'];
$jumlah_obat=$_POST['jumlah_obat'];

//proses simpan obat
    $sql="INSERT INTO tbl_obat VALUES('','$kode_obat','$nama_obat','$harga_obat','$jumlah_obat')";
    if(mysqli_query($koneksi,$sql)) {
        echo '<script>
            alert("Data obat telah ditambahkan");
        </script>
        <meta http-equiv="refresh" content="0, obat.php">';
    } else {
        echo '<script>
            alert("Gagal menambahkan data obat");
        </script>
        <meta http-equiv="refresh" content="0, obat.php">';
    }