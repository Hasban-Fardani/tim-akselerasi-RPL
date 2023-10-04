<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$status = $_POST['status'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];

$allowedExtensions = array("jpg", "jpeg", "png", "gif");
$filename = $_FILES["foto"]["name"];
$file_extension = pathinfo($filename)['extension'];

$uploadDir = 'photos/';
$uploadFile = $uploadDir . basename($filename);

if (!in_array($file_extension, $allowedExtensions)) {
  echo "Hanya file dengan ekstensi JPG, JPEG, PNG, atau GIF yang diizinkan.";
  return;
}

if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)){
  echo "error saat upload file";
}

$res = $con->query("
  INSERT INTO 
    tbl_tamu (nama, telp, email, status, jk, alamat, tgl_entri, foto) 
  VALUES 
    ('$nama', '$telp', '$email', '$status', '$jk', '$alamat', NOW(), $uploadFile)
");


$hubungan = $_POST['hubungan'];
$last_id = mysqli_insert_id($con);
foreach ($hubungan as $hub) {
  $con->query("INSERT INTO tbl_hubungan
  (id_tamu, hubungan)
  VALUES ('$last_id', '$hub')
  ");
}

header("Location: dashboard.php")
?>