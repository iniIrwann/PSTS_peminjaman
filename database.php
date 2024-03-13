<?php
$servername = "localhost";
$database = "peminjaman";
$password = "";
$conn = mysqli_connect($servername, "root", $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
function query($kueri)
{
    global $conn;
    $result = mysqli_query($conn, $kueri);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cek_login($username, $password)
{
    global $conn;
    $uname = $username;
    $upass = $password;
    $hasil = mysqli_query($conn, "select * from user where username='$uname' and password='$upass'");
    $cek = mysqli_num_rows($hasil);
    if ($cek > 0) {
        $query = mysqli_fetch_array($hasil);
        $_SESSION['id'] = $query['id'];
        $_SESSION['nama'] = $query['nama'];
        $_SESSION['role'] = $query['role'];
        $_SESSION['no_identitas'] = $query['no_identitas'];
        return true;
    } else {
        return false;
    }
}

function showcatatan()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT peminjaman.id, peminjaman.tgl_pinjam, peminjaman.tgl_kembail, peminjaman.no_identitas, barang.kode_brg, peminjaman.jumlah, peminjaman.keperluan, peminjaman.status, peminjaman.id_login
    FROM peminjaman INNER JOIN barang ON peminjaman.kode_brg = barang.kode_brg;");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function editdata($tablename, $id)
{
    global $conn;
    $sql = mysqli_query($conn, "SELECT * FROM $tablename WHERE id = '$id'");
    return $sql;
}

function update($data)
{
    global $conn;
    $hasil = mysqli_query($conn, $data);
    return $hasil;
}
function inputdata($data)
{
    global $conn;
    $sql = mysqli_query($conn, $data);
    return $sql;
}
function hapus($data)
{
    global $conn;
    mysqli_query($conn, $data);
    return mysqli_affected_rows($conn);
}
