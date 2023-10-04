<?php
include 'koneksi.php';

$id_tamu = $_POST['id_tamu'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$status = $_POST['status'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];

$query = $con->query("UPDATE tbl_tamu 
  SET nama='$nama',
      telp='$telp',
      email='$email',
      status='$status',
      alamat='$alamat',
      jk='$jk'
  WHERE id_tamu = '$id_tamu';
");

$con->query("DELETE FROM tbl_hubungan WHERE id_tamu='$id_tamu'");

$hubungan = $_POST['hubungan'];
foreach ($hubungan as $hub) {
  $con->query("INSERT INTO tbl_hubungan
  (id_tamu, hubungan)
  VALUES ('$id_tamu', '$hub')
  ");
}

if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
  $allowedExtensions = array("jpg", "jpeg", "png", "gif");
  $filename = $_FILES["foto"]["name"];
  $file_extension = pathinfo($filename)['extension'];

  $uploadDir = 'photos/';
  $uploadFile = $uploadDir . basename($filename);

  if (!in_array($file_extension, $allowedExtensions)) {
    echo "Hanya file dengan ekstensi JPG, JPEG, PNG, atau GIF yang diizinkan.";
    return;
  }

  if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
    echo "error saat upload file";
  }

  $con->query("UPDATE tbl_tamu 
  SET foto='$uploadFile'
  WHERE id_tamu = '$id_tamu';");
}


header("Location: dashboard.php")
?>