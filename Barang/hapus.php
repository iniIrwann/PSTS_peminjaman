<?php
require_once("../database.php");
$no = $_GET['id'];
if (hapus("DELETE FROM barang WHERE id = '$no'") > 0) {
  header("location:barang.php");
}

?>