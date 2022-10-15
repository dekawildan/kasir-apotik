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
                <li><a href="petugas.php" class="aktif">Petugas</a></li>
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
            <p>&nbsp;
                <h2 align="center">Tambah Petugas</h2>
                <form method="post" action="simpanpetugas.php">
                    <table width="90%" border="0" cellpadding="3" cellspacing="3">
                        <tr>
                            <td width="25%">Nama Lengkap</td>
                            <td width="65%">: <input name="nama_petugas" id="namapetugas" type="text" class="kolom" placeholder="Nama Lengkap..." required></td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="nama_petugas" style="color:red; display:none;">Nama lengkap wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td width="25%">Username</td>
                            <td width="65%">: <input name="username" id="user" type="text" class="kolom" placeholder="Username..." required></td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="username" style="color:red; display:none;">Username wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td width="25%">Password</td>
                            <td width="65%">: <input name="password" id="pass" type="password" class="kolom" placeholder="Password..." autocomplete=false required></td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="password" style="color:red; display:none;">Password wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td width="25%">Konfirmasi Password</td>
                            <td width="65%">: <input name="confirm_password" id="confirm" type="password" class="kolom" placeholder="Konfirmasi Password..." autocomplete=false required></td>
                        </tr>
                        <tr>
                            <td width="25%"></td>
                            <td width="65%"><span id="confirm_password" style="color:red; display:none;">Konfirmasi Password wajib diisi</span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><button type="submit" class="tambah" name="btnsimpan" id="btnsimpan" onclick="cek()">Tambahkan</button></td>
                        </tr>
                    </table>
                </form>
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
            var namapetugas=document.getElementById("namapetugas").value;
            var user=document.getElementById("user").value;
            var pass=document.getElementById("pass").value;
            var confirm=document.getElementById("confirm").value;

            if(namapetugas == "" || user == "" || pass == "" || confirm == "") {
                document.getElementById("nama_petugas").style.display="block";
                document.getElementById("username").style.display="block";
                document.getElementById("password").style.display="block";
                document.getElementById("confirm_password").style.display="block";
            }
        }
            
    </script>
</body>
</html>