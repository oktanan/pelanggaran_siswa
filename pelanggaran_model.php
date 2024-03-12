<?php 
session_start();
require_once('koneksi.php');
// Sintak input_siswa
if (isset($_POST['simpan_laporan'])) {//post : mengirim data tapi tidak terlihat melalui form
    $nis = $_POST['nis'];
    $id_tipe = $_POST['id_tipe'];
    $tanggal = $_POST['tanggal'];
    $query = "INSERT INTO pelanggaran VALUES(
        '',
        '$nis',
        '$id_tipe',
        '$tanggal'
    )";
     mysqli_query($conn, $query);  
     header("Location: list_pelanggaran.php");
}
if(isset($_POST['simpan_pelanggaran'])){
    $violation_name = $_POST['violation_name'];
    $get_point =  $_POST['get_point'];
    $query = "INSERT INTO tipe_pelanggaran VALUES(
        '',
        '$violation_name',
        '$get_point'
        )";
    mysqli_query($conn, $query);
    echo"<script> alert('Data anda telah disimpan'); </script>";
    echo" <script> window.location.href = 'kategori_pelanggaran.php'; </script>";
}//
if(isset($_POST['simpan'])){
    $nis = $_POST['nis'];
    $nama_siswa =  $_POST['nama_siswa'];
    $kelas =  $_POST['kelas'];
    $query = "INSERT INTO siswa VALUES(
        '',
        '$nis',
        '$nama_siswa',
        '$kelas'
        )";
    mysqli_query($conn, $query);
    echo"<script> alert('Data anda telah disimpan'); </script>";
    echo" <script> window.location.href = 'datasiswa.php'; </script>";
}//
if(isset($_GET['hapus'])){
    $id_tipe = $_GET['hapus'];//$_GET= VARIABEL YANG ADA DIDALAM ALAMAT URL
    $query = "DELETE FROM tipe_pelanggaran where id_tipe = '$id_tipe' "; 
    mysqli_query($conn, $query);
    echo "<script> alert('Laporan berhasil dihapus'); </script>";
    echo "<script> window.location.href = 'kategori_pelanggaran.php' </script>";
}
if(isset($_GET['drop'])){
    $id_pelanggaran = $_GET['drop'];//$_GET= VARIABEL YANG ADA DIDALAM ALAMAT URL
    $query = "DELETE FROM pelanggaran WHERE id_pelanggaran = '$id_pelanggaran' "; 
    mysqli_query($conn, $query);
    echo "<script> alert('Laporan berhasil dihapus'); </script>";
    echo "<script> window.location.href = 'list_pelanggaran.php' </script>";
}
if(isset($_GET['delete'])){
    $id_siswa = $_GET['delete'];//$_GET= VARIABEL YANG ADA DIDALAM ALAMAT URL
    $query = "DELETE FROM siswa where id_siswa = '$id_siswa' "; 
    mysqli_query($conn, $query);
    echo "<script> alert('Laporan berhasil dihapus'); </script>";
    echo "<script> window.location.href = 'datasiswa.php' </script>";
}
if(isset($_POST['update'])){
    $nama_siswa = $_POST['nama_siswa'];
    $violation_name = $_POST['violation_name'];
    $tanggal = $_POST['tanggal'];
    $id = $_POST['id'];
    $query = "UPDATE pelanggaran SET 
        nama_siswa = '$nama_siswa',
        violation_name = '$violation_name',
        tanggal  = '$tanggal '
        WHERE id_pelanggaran = '$id'
    ";
    mysqli_query($conn, $query);
    echo "<script> alert('Berhasil Update Produk'); </script>";
    echo "<script> window.location.href = 'produk.php'; </script>";
              
}

?>