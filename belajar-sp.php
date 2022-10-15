<?php
//koneksi ke dbms
$koneksi=mysqli_connect("localhost","root","","apotik_12345") or die("Gagal koneksi");
mysqli_select_db($koneksi,"apotik_12345") or die("Tidak dapat memilih database");

//data tabel
echo "<table width='80%' border='1'>
        <tr>
            <th>No.</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Harga Obat</th>
            <th>Jumlah Obat</th>
        </tr>";
        $sql=mysqli_query($koneksi,"CALL tampil_obat()");
        while($row=mysqli_fetch_array($sql)) {
            echo "<tr>
                <td>$row[obat_id]</td>
                <td>$row[kode_obat]</td>
                <td>$row[nama_obat]</td>
                <td>$row[harga_obat]</td>
                <td>$row[jumlah_obat]</td>
            </tr>";
        }

echo "</table>";