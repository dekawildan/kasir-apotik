<?php
//memanggil koneksi
include "koneksi.php";

//bikin variabel
$pecah_obat=explode("-",$_POST['obat_id']);
$obat_id=$pecah_obat[0];
$pecah_pelanggan=explode("-",$_POST['pelanggan_id']);
$pelanggan_id=$pecah_pelanggan[0];
$pecah_petugas=explode("-",$_POST['user_id']);
$user_id=$pecah_petugas[0];
$tgl_transaksi=$_POST['tanggal_transaksi'];
$jumlah_beli=$_POST['jumlah_beli'];
$jumlah_harga=$_POST['jumlah_harga'];
$diskon=$_POST['diskon'];
$total_bayar=$_POST['harga_setelah_diskon'];

//proses simpan ke tabel database
    $sql="INSERT INTO tbl_transaksi VALUES('','$obat_id','$pelanggan_id','$user_id','$tgl_transaksi','$jumlah_beli','$jumlah_harga','$diskon','$total_bayar')";
    if(mysqli_query($koneksi,$sql)) {
        echo '<script>
            alert("Data Transaksi telah ditambahkan");
        </script>
        <meta http-equiv="refresh" content="0, transaksi.php">';
    } else {
        echo '<script>
            alert("Gagal menambahkan data transaksi");
        </script>
        <meta http-equiv="refresh" content="0, transaksi.php">';
    }