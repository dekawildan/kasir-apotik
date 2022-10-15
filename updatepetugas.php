<?php
//memanggil koneksi
include "koneksi.php";

//bikin variabel
$user_id=$_POST['user_id'];
$nama_petugas=$_POST['nama_petugas'];
$username=$_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['confirm_password'];

//kondisi dimana password dicek terlebih dahulu apakah sama atau tidak
if($password == $confirm) {
    $sql="UPDATE tbl_login SET nama_petugas='$nama_petugas', username='$username', password='$password' WHERE user_id='$user_id'";
    if(mysqli_query($koneksi,$sql)) {
        echo '<script>
            alert("Data petugas telah diperbarui");
        </script>
        <meta http-equiv="refresh" content="0, petugas.php">';
    } else {
        echo '<script>
            alert("Gagal memperbarui data petugas");
        </script>
        <meta http-equiv="refresh" content="0, petugas.php">';
    }
} else {
    echo '<script>
            alert("Password tidak sama");
        </script>
        <meta http-equiv="refresh" content="0, petugas.php">';
}