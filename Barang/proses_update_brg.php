<?php
require_once("../database.php");
$id = $_POST['id'];
$kode_brg = $_POST['kodebarang'];
$nama_brg = $_POST['namabarang'];
$kategori =  $_POST['kategorii'];
$merk = $_POST['merkk'];
$jumlah = $_POST['jumlahh'];
$sql2 = update("UPDATE barang SET kode_brg='$kode_brg', nama_brg='$nama_brg', kategori='$kategori'
, merk='$merk', jumlah='$jumlah' WHERE id = '$id' ");
if ($sql2) {
    header("location:barang.php");
    exit();

} else {
    header("location:../home.php");
}

?>