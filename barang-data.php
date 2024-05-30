<h3> Data Mapel </h3>

<table border="1">
    <tr>
        <th>No</th>
        <th>Kode Mapel</th>
        <th>Nama Siswa</th>
        <th>Nama Mapel</th>
        <th>Kelas</th>
    </tr>

    <?php
    include "koneksi.php";

    $no=1;
    $ambildata = mysqli_query($koneksi,"select * from mapel");
    /* While untuk mengulang*/
    while($tampil = mysqli_fetch_array($ambildata)){
        echo"
        <tr>
            <td>$no</td>
            <td>$tampil[kode_mapel]</td>
            <td>$tampil[nama_siswa]</td>
            <td>$tampil[nama_mapel]</td>
            <td>$tampil[kelas]</td>
        </tr>";
        $no++;
    }
    ?>
</table>
