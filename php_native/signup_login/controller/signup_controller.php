<?php
require "../utils/connection.php";

$username = $_POST["username"];
$nama_lengkap = $_POST["nama_lengkap"];
$jk = $_POST["jk"];
$telp = $_POST["telp"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$password = $_POST["password"];
$id_kota_asal = $_POST["kota"];

mysqli_query($con, "INSERT INTO tb_pelanggan (username, password, nama_pelanggan, id_kota_asal, no_telp, jk, tgl_lahir)
VALUES ('$username', '$password', '$nama_lengkap', '$id_kota_asal', '$telp', '$jk', '$tanggal_lahir');
");

if ($err = mysqli_error($con)){
  echo $err;
}

header("Location: /login.php");
?>