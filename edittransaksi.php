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
                <li><a href="obat.php">Obat</a></li>
                <li><a href="pelanggan.php">Pelanggan</a></li>
                <li><a href="transaksi.php" class="aktif">Transaksi</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </nav>
    </aside>

    <!--Artikel untuk konten-->
    <article id="article">
        <section>
            <p>&nbsp;
            <?php
                include "koneksi.php";
                $transaksi_id=$_POST['transaksi_id'];
                $sql=mysqli_query($koneksi, "SELECT tbl_login.*, tbl_pelanggan.*, tbl_obat.*, tbl_transaksi.* FROM tbl_login,tbl_pelanggan,tbl_obat,tbl_transaksi WHERE tbl_login.user_id=tbl_transaksi.user_id AND tbl_pelanggan.pelanggan_id=tbl_transaksi.pelanggan_id AND tbl_obat.obat_id=tbl_transaksi.obat_id AND transaksi_id='$transaksi_id'");
                while($rowtransaksi=mysqli_fetch_array($sql)) {
            ?>
                <h2 align="center">Edit Transaksi <?php echo $rowtransaksi['nama_pelanggan'] ?></h2>
                <form method="post" action="updatetransaksi.php">
                    <table width="90%" border="0" cellpadding="3" cellspacing="3">
                        <tr>
                            <td width="25%">Nama Obat
                                <input type="hidden" name="transaksi_id" value="<?php echo $rowtransaksi['transaksi_id']; ?>">
                            </td>
                            <td width="65%">: 
                                <select name="obat_id" class="kolom" id="obat_id" required>
                                    <?php
                                        include "koneksi.php";
                                        $sqlobat=mysqli_query($koneksi,"SELECT * FROM tbl_obat");
                                        echo "<option selected>$rowtransaksi[obat_id]-$rowtransaksi[nama_obat]</option>";
                                        while($rowobat=mysqli_fetch_array($sqlobat)) {
                                            echo "<option>$rowobat[obat_id]-$rowobat[nama_obat]</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="obatid" style="color:red; display:none;">Nama Obat wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td width="25%">Nama Pelanggan</td>
                            <td width="65%">: 
                                <select name="pelanggan_id" class="kolom" id="pelanggan_id" required>
                                    <?php
                                        include "koneksi.php";
                                        $sqlpelanggan=mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan");
                                        echo "<option selected>$rowtransaksi[pelanggan_id]-$rowtransaksi[nama_pelanggan]</option>";
                                        while($rowpelanggan=mysqli_fetch_array($sqlpelanggan)) {
                                            echo "<option>$rowpelanggan[pelanggan_id]-$rowpelanggan[nama_pelanggan]</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="pelangganid" style="color:red; display:none;">Nama pelanggan wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td width="25%">Petugas</td>
                            <td width="65%">: 
                                    <?php
                                        include "koneksi.php";
                                        $sqlpetugas=mysqli_query($koneksi,"SELECT * FROM tbl_login WHERE username='$_SESSION[username]'");
                                        while($rowpetugas=mysqli_fetch_array($sqlpetugas)) {
                                            echo "<input name='user_id' id='user_id' type='text' class='kolom' value='$rowpetugas[user_id]-$rowpetugas[nama_petugas]' required readonly>";
                                        }
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="userid" style="color:red; display:none;">Nama Petugas wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td width="25%">Tanggal Transaksi</td>
                            <td width="65%">: 
                                <input type="date" name="tanggal_transaksi" class="kolom" id="tanggal_transaksi" value="<?php echo $rowtransaksi['tanggal_transaksi']; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="tgltransaksi" style="color:red; display:none;">Tanggal Transaksi wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td width="25%">Jumlah Beli</td>
                            <td width="65%">: 
                                <input type="number" name="jumlah_beli" class="kolom" id="jumlah_beli" value="<?php echo $rowtransaksi['jumlah_beli']; ?>" placeholder="Jumlah Beli..." required>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="jumlahbeli" style="color:red; display:none;">Jumlah beli wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td width="25%">Jumlah Harga</td>
                            <td width="65%">: 
                                <input type="number" name="jumlah_harga" class="kolom" id="jumlah_harga" value="<?php echo $rowtransaksi['jumlah_harga']; ?>" placeholder="Jumlah Harga..." required>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="jumlahharga" style="color:red; display:none;">Jumlah Harga wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td width="25%">Diskon</td>
                            <td width="65%">: 
                                <input type="number" name="diskon" class="kolom" id="diskon" value="<?php echo $rowtransaksi['diskon']; ?>" placeholder="Diskon..." required>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="spandiskon" style="color:red; display:none;">Diskon wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td width="25%">Harga Setelah Diskon</td>
                            <td width="65%">: 
                                <input type="number" name="harga_setelah_diskon" class="kolom" id="harga_setelah_diskon" value="<?php echo $rowtransaksi['harga_setelah_diskon']; ?>" placeholder="Harga Setelah Diskon..." onclick="hitungharga()" readonly required>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="hargasetelahdiskon" style="color:red; display:none;">Total Harga wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><button type="submit" class="tambah" name="btnsimpan" id="btnsimpan" onclick="cek()">Ubah Data</button></td>
                        </tr>
                    </table>
                </form>
                <?php
                }
                ?>
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

        //Syntax javascript pesan kosong
        function cek() {
            var obat_id=document.getElementById("obat_id").value;
            var pelanggan_id=document.getElementById("pelanggan_id").value;
            var user_id=document.getElementById("user_id").value;
            var tgl_trans=document.getElementById("tanggal_transaksi").value;
            var jumlah_beli=document.getElementById("jumlah_beli").value;
            var jumlah_harga=document.getElementById("jumlah_harga").value;
            var diskon=document.getElementById("diskon").value;
            var total_bayar=document.getElementById("harga_setelah_diskon").value;

            if(obat_id == "" || pelanggan_id == "" || user_id == "" || tgl_trans == "" || jumlah_beli == "" || jumlah_harga == "" || diskon == "" || total_bayar == "") {
                document.getElementById("obatid").style.display="block";
                document.getElementById("pelangganid").style.display="block";
                document.getElementById("userid").style.display="block";
                document.getElementById("tgltransaksi").style.display="block";
                document.getElementById("jumlahbeli").style.display="block";
                document.getElementById("jumlahharga").style.display="block";
                document.getElementById("spandiskon").style.display="block";
                document.getElementById("hargasetelahdiskon").style.display="block";
            }
        }
            
        //menghitung total bayar
        function hitungharga() {
            var jmlharga=document.getElementById("jumlah_harga").value;
            var jmlbeli=document.getElementById("jumlah_beli").value;
            var diskon=document.getElementById("diskon").value;

            var hitung=(jmlharga*jmlbeli)-diskon;
            document.getElementById("harga_setelah_diskon").value=hitung;
        }
    </script>
</body>
</html>