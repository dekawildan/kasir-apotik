<?php
//memanggil koneksi
include "koneksi.php";

//bikin variabel
$nama_petugas=$_POST['nama_petugas'];
$username=$_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['confirm_password'];

//kondisi dimana password dicek terlebih dahulu apakah sama atau tidak
if($password == $confirm) {
    $sql="INSERT INTO tbl_login VALUES('','$nama_petugas','$username','$password')";
    if(mysqli_query($koneksi,$sql)) {
        echo '<script>
            alert("Data petugas telah ditambahkan");
        </script>
        <meta http-equiv="refresh" content="0, petugas.php">';
    } else {
        echo '<script>
            alert("Gagal menambahkan data petugas");
        </script>
        <meta http-equiv="refresh" content="0, petugas.php">';
    }
} else {
    echo '<script>
            alert("Password tidak sama");
        </script>
        <meta http-equiv="refresh" content="0, tambahpetugas.php">';
}