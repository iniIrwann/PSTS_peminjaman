<?php
// proses_pinjam.php
require_once("../database.php");
session_start();
if (isset($_POST['Pinjam'])) {
   $tgl_kembail = $_POST['tgl_kembail'];
   $kode_brg = $_POST['kode_brg'];
   $no_identitas = $_SESSION['no_identitas'];
   $jumlah = $_POST['jumlah'];
   $keperluan = $_POST['keperluan'];
   $status = $_POST['status'];
   $id_login = $_SESSION['id'];

   $simpan = inputdata("INSERT INTO peminjaman 
   (id,tgl_pinjam, tgl_kembail, no_identitas, kode_brg, jumlah, keperluan,status,id_login) 
VALUES 
(null, now(),'$tgl_kembail', '$no_identitas', '$kode_brg', '$jumlah','$keperluan',
'$status','$id_login')");

   if ($simpan) {
      header("location:home.php");
      exit();
   } elseif (!$simpan) {
      echo '<script>alert("Maaf, data Anda kosong"); window.location="../peminjaman.php";</script>';
   } else {
      header("location:../404.html");
   }

}
?>