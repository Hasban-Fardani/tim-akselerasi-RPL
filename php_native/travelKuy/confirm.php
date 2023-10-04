<?php
require 'utils/connection.php';

$id_perjalanan = $_GET['id_perjalanan'];
$username = $_SESSION['username'];

$res = $con->query("SELECT
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
p.id_perjalanan = '$id_perjalanan'
;
");

while ($row = mysqli_fetch_assoc($res)) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Kuy</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body class="flex flex-col min-h-screen">
  <?php include 'components/header.php' ?>
  <main class="flex-grow">
    <?php if ($username) { ?>
      <h1>Konfirmasi</h1>
    <?php } else { ?>
      <div class="flex items-center justify-center">
        <div class="flex items-start justify-start gap-4">
          <div class="card card-bordered shadow-lg p-6 mt-8">
            <h1 class="text-xl font-semibold">Informasi pemesanan</h1>
            <form action="/controller/confirm_controller.php" method="post">
              <h2 class="text-base text-gray-400 font-medium">Sediakan Informasi Pribadimu</h2>
              <label class="label">Nama</label>
              <input name="name" type="text" placeholder="masukkan lengkap nama anda" class="input input-bordered uppercase placeholder:lowercase w-96">

              <div class="flex gap-8">
                <div>
                  <label class="label">Email</label> 
                  <input name="email" type="email" placeholder="masukkan email" class="input input-bordered w-44">
                </div>
                <div>
                  <label class="label">No Telp</label> 
                  <input name="telp" type="text" placeholder="masukkan nomer telp" class="input input-bordered w-44">
                </div>
              </div>
              
              <label class="label">Jenis Kelamin</label>
              <select name="jk" class="select select-bordered">
                <option value="l">Pria</option>
                <option value="p">Wanita</option>
              </select>
              <!-- <label class="label">Jumlah kursi</label>
              <input name="jumlah_kursi" type="number" class="input input-bordered"> -->
              <label class="label">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="input input-bordered">
              <br>
              <input type="text" name="id_perjalanan" class="hidden" value="<?php echo $row['id_perjalanan']?>">
              <input type="text" name="id_kota_asal" class="hidden" value="<?php echo $row['id_kota_asal']?>">
              <input type="text" name="waktu_berangkat" class="hidden" value="<?php echo $row['waktu_berangkat']?>">
              <button type="submit" class="btn btn-primary mt-8">Pesan</button>
            </form>
          </div>
          <div class="card card-bordered shadow-lg p-6 mt-8">
            <h2 class="text-xl font-semibold">Informasi Keberangkatan</h2>
            <div>
              <h2 class="font-medium"><?php echo $row['nama_kota_asal']?></h2>
              <div class="border-l-2 h-4 ml-2"></div>
              <h2 class="font-medium"><?php echo $row['nama_kota_tuju']?></h2>
            </div>
            <p><?php echo $row['waktu_berangkat']?></p>
          </div>
        </div>
      </div>

    <?php } ?>
  </main>
  <div class="mt-8">
    <?php include 'components/footer.php' ?>
  </div>
</body>

</html>
<?php }?>