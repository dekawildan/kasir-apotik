<?php
//memanggil koneksi
include "koneksi.php";

//bikin variabel
$obat_id=$_POST['obat_id'];
$kode_obat=$_POST['kode_obat'];
$nama_obat=$_POST['nama_obat'];
$harga_obat=$_POST['harga_obat'];
$jumlah_obat=$_POST['jumlah_obat'];

//proses simpan obat
    $sql="UPDATE tbl_obat SET kode_obat='$kode_obat', nama_obat='$nama_obat', harga_obat='$harga_obat', jumlah_obat='$jumlah_obat' WHERE obat_id='$obat_id'";
    if(mysqli_query($koneksi,$sql)) {
        echo '<script>
            alert("Data obat telah diperbarui");
        </script>
        <meta http-equiv="refresh" content="0, obat.php">';
    } else {
        echo '<script>
            alert("Gagal memperbarui data obat");
        </script>
        <meta http-equiv="refresh" content="0, obat.php">';
    }