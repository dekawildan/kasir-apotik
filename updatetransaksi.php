<?php
//memanggil koneksi
include "koneksi.php";

//bikin variabel
$transaksi_id=$_POST['transaksi_id'];
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
    $sql="UPDATE tbl_transaksi SET obat_id='$obat_id', pelanggan_id='$pelanggan_id', user_id='$user_id', tanggal_transaksi='$tgl_transaksi', jumlah_beli='$jumlah_beli', jumlah_harga='$jumlah_harga', diskon='$diskon', harga_setelah_diskon='$total_bayar' WHERE transaksi_id='$transaksi_id'";
    if(mysqli_query($koneksi,$sql)) {
        echo '<script>
            alert("Data Transaksi telah diperbarui");
        </script>
        <meta http-equiv="refresh" content="0, transaksi.php">';
    } else {
        echo '<script>
            alert("Gagal memperbarui data transaksi");
        </script>
        <meta http-equiv="refresh" content="0, transaksi.php">';
    }