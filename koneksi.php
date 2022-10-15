<?php
$koneksi=mysqli_connect("localhost","root","","apotik_12345") or die("Gagal mengkoneksikan dbms");
$selectdb=mysqli_select_db($koneksi,"apotik_12345") or die("Gagal memilih database");