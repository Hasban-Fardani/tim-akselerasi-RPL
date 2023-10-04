<?php
require 'utils/connection.php';

$id_kota_asal = $_GET["id_kota_asal"];
$id_kota_tuju = $_GET["id_kota_tuju"];
$waktu = $_GET['waktu_berangkat'];

$res = $con->
  query("SELECT
  p.id_perjalanan   as 'id_perjalanan', 
  p.kapasitas       as 'kapasitas', 
  p.waktu_berangkat as 'waktu_berangkat', 
  p.harga           as 'harga',  
  t.id_travel       as 'id_travel',  
  t.nama_travel     as 'nama_travel', 
  k_a.id_kota       as 'id_kota_asal',
  k_a.nama_kota     as 'nama_kota_asal', 
  k_t.id_kota       as 'id_kota_tuju',
  k_t.nama_kota     as 'nama_kota_tuju'
from 
  tb_perjalanan as p
JOIN 
  tb_travel as t 
  ON t.id_travel = p.id_travel
JOIN 
  tb_kota as k_a
  ON k_a.id_kota = p.id_kota_asal
JOIN 
  tb_kota as k_t
  ON k_t.id_kota = p.id_kota_tuju
WHERE 
  k_a.id_kota = '$id_kota_asal'
  AND
  k_t.id_kota = '$id_kota_tuju'
  AND
  DATE(p.waktu_berangkat) > DATE('$waktu')
;
");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Kuy | Search</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
 <?php include 'components/header.php'; ?>
 
  <main class="gap-6 mt-10">
    <h1 class="text-4xl font-semibold my-6 text-center">Hasil Pencarian</h1>

    <div class="flex flex-row flex-wrap justify-center items-center gap-6">
    <?php
    if (mysqli_num_rows($res)  == 0) {
      echo '<h2 class="text-center font-semibold text-lg">Maaf Tidak ada perjalanan di tanggal yang anda pilih</h2>';
    }
    while ($row = $res->fetch_assoc()) {
      echo '
      <div>
        <div class="card bordered w-70 shadow-xl">
          <div class="card-body p-3">
      '.
          '<div class="grid grid-cols-2">'.
            '<p class="text-lg font-semibold col-span-2">'. 
              $row["nama_travel"].      
            '</p>'.
            '<p class="text-sm font-mono col-span-2">'. $row["nama_kota_asal"]. " - " .$row["nama_kota_tuju"].  '</p>'.
            '<p class="mt-2">harga</p>'.
            '<p class="text-sm mt-2">'. ":". " Rp " . number_format($row["harga"], 0, ',', '.').'</p>'.
            '<p>Kapasitas</p>'.
            '<p class="text-sm">'. ": ". $row["kapasitas"].        '</p>'.
            '<p>Waktu</p>'.
            '<p class="text-sm">'. ": ". $row["waktu_berangkat"].  '</p>'.
          '<div class="card-actions mt-2">'.
            '<button class="btn btn-primary" onclick="'. $row["id_perjalanan"] .'.showModal()">Pesan</button>'.
            '
            <dialog id="'. $row["id_perjalanan"] .'" class="modal">
              <div class="modal-box">
               <h3 class="font-bold text-lg">Informasi Tambahan</h3>
                <p class="py-4">'. "" .'</p>
                <div class="modal-action">
                <p class="py-4">Pesan Sekarang!</p>
                <div class="flex gap-2">
                <!-- if there is a button in form, it will close the modal -->
                <form method="dialog">
                  <button class="btn btn-error">Cancel</button>
                </form>
                  <a href="/confirm.php?id_perjalanan='. $row['id_perjalanan'] .'"><button class="btn btn-success">Yes</button></a>
                </div>
                </div>
              </div>
            </dialog>'.
          '</div>'.
          '</div>
          </div>
        </div>
      </div>
      ';
    }
    ?>
    </div>
  </main>

  <div class="mt-8">
    <?php include 'components/footer.php';?>
  </div>
</body>

</html>