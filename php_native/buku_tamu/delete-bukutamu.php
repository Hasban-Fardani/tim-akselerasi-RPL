<?php
if (!$_SESSION['username']){
  header('Location: index.html');
}
include 'koneksi.php';

$id_tamu = $_GET['id_tamu'];
$res = $con->query("DELETE FROM tbl_tamu WHERE id_tamu='$id_tamu'");
header("Location: dashboard.php");
?>