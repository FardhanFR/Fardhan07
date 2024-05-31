<?php
include "koneksi.php";
$sql=mysqli_query($koneksi,"select * from barang where kode_mapel='$_GET[kode]'");
$data=mysqli_fetch_array($sql);
?>
<h3> Ubah Data Mapel</h3>
<form action="" method="post">
    <table>
    <tr>
        <td width="120"> Kode Mapel</td>
        <td> <input type="text" name="kode_mapel" value="<?php echo $data['kode_mapel']; ?>"> </td>
    </tr>
    <tr>
        <td> Nama Siswa </td>
        <td> <input type="text" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>"> </td>
    </tr>
    <tr>
        <td> Nama Mapel </td>
        <td> <input type="text" name="nama_mapel" value="<?php echo $data['nama_mapel']; ?>"> </td>
    </tr>
    <tr>
        <td> Kelas </td>
        <td> <input type="text" name="kelas" value="<?php echo $data['kelas']; ?>"> </td>
    </tr>
    <tr>
        <td></td>
        <td> <input type="submit" name="proses" value="Ubah"> </td>
        <td></td>
        <input type="button" value="GO back" onclick="history.back()">
    </tr>
    </table>
</form>
<?php
/* digunakan update data */
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"update barang set
    nama_siswa = '$_POST[nama_siswa]',
    nama_mapel = '$_POST[nama_mapel]',
    kelas = '$_POST[kelas]'
    where kode_mapel = '$_GET[kode]'");

    echo "Data baru telah diubah";
    echo "<meta http-equiv=refresh content=1;URL='barang-tambah.php>'";
    /* digunakan untuk merefresh otomatis dan data update */
}
?>
