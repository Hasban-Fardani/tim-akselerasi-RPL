<?php
include('koneksi.php');
$username = $_POST["username"];
$password = md5($_POST["password"]);

$query = "SELECT * FROM tb_user WHERE username='$username' 
    AND `password`='$password'";

$result = $con->query($query);
if ($result->num_rows == 1) {
  session_start();
  while($row = $result->fetch_assoc()){
    $_SESSION['username'] = $row['username'];
    $_SESSION['hak_akses'] = $row['hak_akses'];
    header("Location: dashboard.php");
    exit();
  }
}
else {
  header('Location: index.php');
}
?>