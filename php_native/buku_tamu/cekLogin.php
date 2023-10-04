<?php
if (!$_SESSION['username']){
  header('Location: index.html');
}

include('koneksi.php');
$username = $_POST["username"];
$password = md5($_POST["password"]);

$query = "SELECT * FROM tbl_user WHERE username='$username' 
    AND `password`='$password'";

$result = $con->query($query);

if ($result->num_rows == 1) {
  session_start();
  while($row = $result->fetch_assoc()){
    $_SESSION['username'] = $row['username'];
    header("Location: dashboard.php");
    exit();
  }
}
else {
  header('Location: index.html');
}
?>