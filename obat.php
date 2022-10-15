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
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="petugas.php">Petugas</a></li>
                <li><a href="obat.php" class="aktif">Obat</a></li>
                <li><a href="pelanggan.php">Pelanggan</a></li>
                <li><a href="transaksi.php">Transaksi</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </nav>
    </aside>

    <!--Artikel untuk konten-->
    <article id="article">
        <section>
            <p>&nbsp; 
                <a href="tambahobat.php"><button type="button" class="tambah">+ Tambah Obat</button></a>
                <br>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="text" name="cari_data" class="kolom" placeholder="Cari Data..." required>
                    <button type="submit" class="tambah" name="btncari">Cari</button>
                </form>
            </p>
            <p>&nbsp;
                <table width="100%" class="tabel-data" border="1" bordercolor="grey" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr class="tabel-data">
                        <th>No.</th>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Harga Obat</th>
                        <th>Jumlah Obat</th>
                        <th>Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "koneksi.php";
                            if(isset($_POST['btncari'])) {
                                $cari=$_POST['cari_data'];
                                $sqlcari=mysqli_query($koneksi, "SELECT * FROM tbl_obat WHERE kode_obat LIKE '%$cari%' OR  nama_obat LIKE '%$cari%'");
                                $hitungcari=mysqli_num_rows($sqlcari);
                                if($hitungcari > 0) {
                                    while($rowcari=mysqli_fetch_array($sqlcari)) {
                                        echo "<tr>
                                            <td>$rowcari[obat_id]</td>
                                            <td>$rowcari[kode_obat]</td>
                                            <td>$rowcari[nama_obat]</td>
                                            <td>$rowcari[harga_obat]</td>
                                            <td>$rowcari[jumlah_obat]</td>
                                            <td align='center'>
                                                <form method='post' action='editobat.php'>
                                                    <input type='hidden' name='obat_id' value='$rowcari[obat_id]'>
                                                    <button type='submit' name='btnedit' class='edit' title='Edit Data $rowcari[nama_obat]'>Edit Data</button>
                                                </form>
                                                <form method='post' action='hapusobat.php'>
                                                    <input type='hidden' name='obat_id' value='$rowcari[obat_id]'>
                                                    <button type='submit' name='btnhapus' class='hapus' title='Hapus Data $rowcari[nama_obat]'>Hapus Data</button>
                                                </form>
                                            </td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr>
                                        <td colspan='6' align='center'>DATA TIDAK DITEMUKAN</td>
                                    </tr>";
                                }
                            } else {
                                $sqldata=mysqli_query($koneksi, "SELECT * FROM tbl_obat");
                                $hitungdata=mysqli_num_rows($sqldata);
                                if($hitungdata > 0) {
                                    while($rowdata=mysqli_fetch_array($sqldata)) {
                                        echo "<tr>
                                            <td>$rowdata[obat_id]</td>
                                            <td>$rowdata[kode_obat]</td>
                                            <td>$rowdata[nama_obat]</td>
                                            <td>$rowdata[harga_obat]</td>
                                            <td>$rowdata[jumlah_obat]</td>
                                            <td align='center'>
                                                <form method='post' action='editobat.php'>
                                                    <input type='hidden' name='obat_id' value='$rowdata[obat_id]'>
                                                    <button type='submit' name='btnedit' class='edit' title='Edit Data $rowdata[nama_obat]'>Edit Data</button>
                                                </form>
                                                <form method='post' action='hapusobat.php'>
                                                    <input type='hidden' name='obat_id' value='$rowdata[obat_id]'>
                                                    <button type='submit' name='btnhapus' class='hapus' title='Hapus Data $rowdata[nama_obat]'>Hapus Data</button>
                                                </form>
                                            </td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr>
                                        <td colspan='6' align='center'>DATA TIDAK DITEMUKAN</td>
                                    </tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </p>
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