<?php
require_once("../database.php");
$no = $_GET['id'];
if (hapus("DELETE FROM peminjaman WHERE id = '$no'") > 0) {
  header("location:home.php");
}

?>