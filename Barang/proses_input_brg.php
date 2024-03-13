<?php
 require_once("../database.php");

$kodebrg = $_POST['kodebarang'];
$namabrg = $_POST['namabarang'];
$kategori =  $_POST['kategorii'];
$merk = $_POST['merkk'];
$jml = $_POST['jumlahh'];
$simpan = inputdata("INSERT INTO barang (id, kode_brg, nama_brg, kategori, merk, jumlah) 
VALUES (null, '$kodebrg','$namabrg', '$kategori', '$merk', '$jml')");

if ($simpan) {
    header("location:barang.php");
    exit();
}elseif(!$simpan){
    echo '<script>alert("Maaf, data Anda kosong"); window.location="../halaman_lain.php";</script>';
}
else{
    header("location:../404.html");
}
     

