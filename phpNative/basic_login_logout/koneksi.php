<?php

// Informasi koneksi ke database
$host = "localhost"; // Lokasi server MySQL (localhost jika dijalankan secara lokal)
$username = "root"; // Nama user MYSQL
$password = "YOURPASSWORD"; // password MYSQL
$database = "belajar_php_adminTemplate"; // nama Database

// Membuat koneksi ke MySQL
$con = mysqli_connect($host, $username, $password, $database);
