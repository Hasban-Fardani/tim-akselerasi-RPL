<?php 
require '../utils/connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$jk = $_POST['jk'];
$id_perjalanan = $_POST['id_perjalanan'];
$id_kota_asal = $_POST['id_kota_asal'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$waktu_berangkat = $_POST['waktu_berangkat'];

$res = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE email='$email';");

// cek apakah pelanggan sebelumnya pernah memesan tiket
// jika tidak maka tambahkan pelanggan
echo mysqli_num_rows($res); 
if (mysqli_num_rows($res) == 0) {
  mysqli_query($con, "INSERT INTO tb_pelanggan (email, nama_pelanggan, id_kota_asal, no_telp, jk, tgl_lahir)
  VALUES ('$email', '$name', '$id_kota_asal', '$telp', '$jk', '$tanggal_lahir');
  ");
  $usr_id = mysqli_insert_id($con);
} else {  // jika ya maka tinggal ambil id nya
  $row = mysqli_fetch_assoc($res);
  $usr_id = $row['id_pelanggan'];
}

if (mysqli_error($con)){
  echo mysqli_error($con);
  return;
}

// // cek apakah kursi masih tersedia
// $result_get_pemesanan = mysqli_query($con, "SELECT COUNT(*) as jumlah FROM tb_pemesanan WHERE id_perjalanan = '$id_perjalanan'");
// if (mysqli_num_rows($result_get_pemesanan) == 1){
//   $rows = mysqli_fetch_assoc($result_get_pemesanan);
//   $rows['jumlah']; 
// }

$currentDateTime = date('YmdHis');
$id_pemesanan = $usr_id.$id_perjalanan.$currentDateTime;
mysqli_query($con, "INSERT INTO tb_pemesanan (id_pemesanan, id_pelanggan, id_perjalanan, tgl_pemesanan)
VALUES ('$id_pemesanan', '$usr_id', '$id_perjalanan', NOW())");

session_start();
$_SESSION['usr_id'] = $usr_id;

header("Location: /dashboard.php");
?>