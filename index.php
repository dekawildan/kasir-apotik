<?php
 include "cek-sesi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="desain.css" rel="stylesheet">
</head>
<body>

    <!--Header aplikasi-->
    <header>
        <div class="header1">
            <h2 style="text-align: center;">ADMIN</h2>
        </div>
        <div class="header2">
            <button type="button" class="ham" id="ham" onclick="sembunyi()">
                <div class="burger"></div>
                <div class="burger"></div>
                <div class="burger"></div>
            </button>
            <button type="button" class="ham" id="burger" onclick="tampil()" style="display: none;">
                <p style="margin: 0; padding: 0; font-weight: bolder; font-size: 12pt; color: white;">&times;</p>
            </button>
            <h2>SISTEM PENJUALAN OBAT</h2>
            <div class="user">
            <h4><?php $pengguna=strtoupper($_SESSION['username']); echo "HALO, $pengguna"; ?></h4>
            </div>
        </div>
    </header>

    <!--Sidebar sebelah kiri-->
    <aside id="aside">
        <nav>
            <ul>
                <li><a href="index.php" class="aktif">Dashboard</a></li>
                <li><a href="petugas.php">Petugas</a></li>
                <li><a href="obat.php">Obat</a></li>
                <li><a href="pelanggan.php">Pelanggan</a></li>
                <li><a href="transaksi.php">Transaksi</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </nav>
    </aside>

    <!--Artikel untuk konten-->
    <article id="article">
        <section>
            <div class="petugas">
                <?php
                    include "koneksi.php";
                    $totalpetugas=mysqli_query($koneksi,"SELECT * FROM tbl_login");
                    $hitungpetugas=mysqli_num_rows($totalpetugas);
                    echo "<h3>Total Petugas : </h3><h2>$hitungpetugas</h2>";
                ?>
            </div>
            <div class="pelanggan">
                <?php
                    include "koneksi.php";
                    $totalpelanggan=mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan");
                    $hitungpelanggan=mysqli_num_rows($totalpelanggan);
                    echo "<h3>Total Pelanggan : </h3><h2>$hitungpelanggan</h2>";
                ?>
            </div>
            <div class="obat">
                <?php
                    include "koneksi.php";
                    $totalobat=mysqli_query($koneksi,"SELECT * FROM tbl_obat");
                    $hitungobat=mysqli_num_rows($totalobat);
                    echo "<h3>Total Obat : </h3><h2>$hitungobat</h2>";
                ?>
            </div>
            <div class="transaksi">
                <?php
                    include "koneksi.php";
                    $totaltransaksi=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi");
                    $hitungtransaksi=mysqli_num_rows($totaltransaksi);
                    echo "<h3>Total Penjualan : </h3><h2>$hitungtransaksi</h2>";
                ?>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </section>
    </article>

    <!--Footer berisi pembuat atau tim pengembang-->
    <footer>
        <p style="text-align: center;">Copyright &copy; 2021 Barokah Jaya Rizki All Reserved</p>
    </footer>


    <script>
        function sembunyi() {
            document.getElementById("aside").style.display="none";
            document.getElementById("article").style.width="100%";
            document.getElementById("ham").style.display="none";
            document.getElementById("burger").style.display="block";
        }
        function tampil() {
            document.getElementById("aside").style.display="block";
            document.getElementById("article").style.width="80%";
            document.getElementById("ham").style.display="block";
            document.getElementById("burger").style.display="none";
        }
    </script>
</body>
</html>