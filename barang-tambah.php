<?php
include 'koneksi.php';
?>
<link rel="stylesheet" href="style.css">
<h3> Tambah Mapel</h3>
<form action="" method="post">
    <table>
    <tr>
        <td width="120"> Kode Mapel</td>
        <td> <input type="text" name="kode_mapel"> </td>
    </tr>
    <tr>
        <td> Nama Siswa </td>
        <td> <input type="text" name="nama_siswa"> </td>
    </tr>
    <tr>
        <td> Nama Mapel </td>
        <td> <input type="text" name="nama_mapel"> </td>
    </tr>
    <tr>
        <td> Kelas </td>
        <td> <input type="text" name="kelas"> </td>
    </tr>
    <tr>
        <td></td>
        <td> <input type="submit" name="proses" value="Simpan"> </td>
    </tr>
    </table>
</form>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into barang set
    kode_mapel = '$_POST[kode_mapel]',
    nama_siswa = '$_POST[nama_siswa]',
    nama_mapel = '$_POST[nama_mapel]',
    kelas = '$_POST[kelas]'");

    echo "Data baru telah di tersimpan";
    echo "<meta http-equiv=refresh content=2;URL='barang-tambah.php>'";
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th width="100">Kode Mapel</th>
        <th width="200">Nama Siswa</th>
        <th width="200">Nama Mapel</th>
        <th width="75">Kelas</th>
        <th colspan="2">Aksi</th>
    </tr>

    <?php
    include "koneksi.php";

    $no=1;
    $ambildata = mysqli_query($koneksi,"select * from barang");
    /* While untuk mengulang*/
    while($tampil = mysqli_fetch_array($ambildata)){
        $warna = ($no%2==1)?"pink":"steelblue";
        echo"
        <tr bgcolor='$warna'>
            <td align=center>$no</td>
            <td align=center>$tampil[kode_mapel]</td>
            <td align=center>$tampil[nama_siswa]</td>
            <td align=center>$tampil[nama_mapel]</td>
            <td align=center>$tampil[kelas]</td>
            <td><a href='?kode=$tampil[kode_mapel]'><input type='button' class='btn-delete'></a></td>
            <td><a href='barang-ubah.php?kode=$tampil[kode_mapel]'><input type='button' class='btn-update'></a></td>
        </tr>";
        $no++;
    }
    ?>
</table>
<?php
if (isset($_GET['kode'])){
    mysqli_query($koneksi,"delete from barang where kode_mapel='$_GET[kode]'");
    echo "data telah dihapus";
    echo "<meta http-equiv=refresh content=2;URL='barang-tambah.php>'";
}
?>
