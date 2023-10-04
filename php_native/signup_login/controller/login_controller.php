<?php
require "../utils/connection.php";

$username = $_POST["username"];
$password = $_POST["password"];
$redirect = $_GET['redirect'];

$query = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE username='$username'");

if (mysqli_num_rows($query) == 0){
  $err_msg = "User not found";
  header("Location: /login.php?msg=".urldecode($err_msg));
} 

while ($row = mysqli_fetch_assoc($query)) {
  $err_msg = "Wrong Password!";
  if ($row["password"] != $password) {
    header("Location: /login.php?msg=".urlencode($err_msg));
    exit();
  }

  session_start();
  $_SESSION["username"] = $row["username"];
  $_SESSION["nama_pelanggan"] = $row["nama_pelanggan"];
  $_SESSION["id_kota_asal"] = $row["id_kota_asal"];
  $_SESSION["jk"] = $row["jk"];
  $_SESSION["tanggal_lahir"] = $row["tanggal_lahir"];
  
  if( $redirect ){
    header("Location: "+$redirect);
    return;
  }
  header("Location: /dashboard.php");
}
?>
