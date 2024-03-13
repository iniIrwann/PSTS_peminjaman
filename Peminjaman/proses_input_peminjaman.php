<?php
 require_once("../database.php");
session_start();
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembail = $_POST['tgl_kembail'];
$no_identitas = $_SESSION['no_identitas'];
$kode_brg = $_POST['kode_brg'];
$jumlah = $_POST['jumlah'];
$keperluan = $_POST['keperluan'];
$status = $_POST['status'];
$id_login = $_SESSION['id'];

$simpan = inputdata("INSERT INTO peminjaman (id,tgl_pinjam, tgl_kembail, no_identitas, kode_brg, jumlah, keperluan,status,id_login) 
VALUES (null, '$tgl_pinjam','$tgl_kembail', '$no_identitas', '$kode_brg', '$jumlah','$keperluan','$status','$id_login')");

if ($simpan) {
    header("location:peminjaman.php");
    exit();
}elseif(!$simpan){
    echo '<script>alert("Maaf, data Anda kosong"); window.location="../peminjaman.php";</script>';
}
else{
    header("location:../404.html");
}
     

