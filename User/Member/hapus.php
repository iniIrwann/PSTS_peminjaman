<?php
require_once("../../database.php");
$no = $_GET['id'];
if (hapus("DELETE FROM user WHERE id = '$no'") > 0) {
  header("location:user.php");
}

