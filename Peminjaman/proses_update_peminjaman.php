<?php
require_once("../database.php");
$id = $_POST['id'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembail = $_POST['tgl_kembail'];
$no_identitas =  $_POST['no_identitas'];
$kode_brg = $_POST['kode_brg'];
$jumlah = $_POST['jumlah'];
$keperluan = $_POST['keperluan'];
$status = $_POST['status'];
$id_login = $_POST['id_login'];
$sql2 = update("UPDATE peminjaman SET tgl_pinjam='$tgl_pinjam', tgl_kembail='$tgl_kembail', no_identitas='$no_identitas'
, kode_brg='$kode_brg', jumlah='$jumlah', keperluan='$keperluan',status='$status',id_login='$id_login' WHERE id = '$id' ");
if ($sql2) {
    header("location:peminjaman.php");
    exit();

} else {
    header("location:../home.php");
}

?>