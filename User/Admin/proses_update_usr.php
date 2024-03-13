<?php
 require_once("../../database.php");
 $id = $_POST['id'];
 $no_identitas = $_POST['no_identitas'];
 $nama = $_POST['nama'];
 $status =  $_POST['status'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $role = $_POST['role'];
  //pencegahan data kosong
 if (empty($no_identitas) || empty($nama) || empty($status) || empty($username) || empty($password) || empty($role)) {
    echo'<script>alert("Mohon isi semua data dengan benar"); window.location="user.php";</script>';
} else {
    //Pengecekan username
    $sql_check = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo'<script>alert("Username Yang Anda Masukan telah terDaftar"); window.location="user.php";</script>';
    } else {

    $simpan = update("UPDATE user SET no_identitas='$no_identitas', nama='$nama', status='$status'
    , username='$username', password='$password',role='$role' WHERE id = '$id' ");
    
    if ($simpan) {
        header("location:user.php");
        exit();
    }elseif(!$simpan){
        echo '<script>alert("Maaf, data Anda kosong"); window.location="../../404.html";</script>';
    }
    else{
        header("location:../../404.html");
    }
  }
}

?>