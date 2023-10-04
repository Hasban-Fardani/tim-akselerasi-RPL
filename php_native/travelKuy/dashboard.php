<?php
session_start();
require 'utils/connection.php';

$usr_id = $_SESSION['usr_id'];
$name = "";
if (isset($usr_id)) {
  $res = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$usr_id'");
  $row = mysqli_fetch_assoc($res);
  $name = $row['nama_pelanggan'];
}

$res = mysqli_query($con, "SELECT 
  p.id_pemesanan,
  p.id_pelanggan,
  p.id_perjalanan,
  j.id_kota_asal,
  j.harga,
  k_a.nama_kota as 'nama_kota_asal',
  j.id_kota_tuju,
  k_t.nama_kota as 'nama_kota_tuju'
FROM 
  tb_pemesanan as p
JOIN 
  tb_perjalanan as j
  ON j.id_perjalanan = p.id_perjalanan
JOIN 
  tb_kota as k_a
  ON k_a.id_kota = j.id_kota_asal
JOIN 
  tb_kota as k_t
  ON k_t.id_kota = j.id_kota_tuju
WHERE
  p.id_pelanggan = '$usr_id';
");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Travel Kuy</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body class="flex flex-col min-h-screen">
  <?php include 'components/header.php' ?>
  <main class="flex-grow">
    <h1 class="mt-10 text-center text-2xl font-bold">History Pemesanan</h1>
    <div class="mt-8 flex flex-wrap items-center justify-center gap-8">
      <?php while ($row = mysqli_fetch_assoc($res)) { ?>
        <div class="card card-bordered shadow-md w-80 text-center">
          <div class="card-body">
            <h1 class="font-semibold text-lg ">Tiket Travel</h1>
            <span class="text-sm font-mono">
              <?php echo $row['id_pemesanan'] ?>
            </span>
            <h2 class="">   
              <span class="font-mono font-medium">
                <?php echo $row['nama_kota_asal'] ?>
              </span>
              -
              <span class="font-mono font-medium">
                <?php echo $row['nama_kota_tuju'] ?>
              </span>
            </h2>
            <div class="card-actions justify-center">
              <button class="btn btn-primary" onclick="<?php echo "modal" . $row['id_pemesanan']?>.showModal()">detail</button>
              <dialog id="<?php echo "modal" . $row['id_pemesanan']?>" class="modal">
                <div class="modal-box">
                  <h3 class="font-bold text-lg">Detail Pemesanan</h3>
                  <h4 class="py-4 font-medium">
                    ID Pemesanan
                    <p class="font-mono"><?php echo $row['id_pemesanan']?></p>
                  </h4>
                  <h4 class="flex font-bold">
                    Rute:
                    <div class="ml-4 flex gap-2">
                      <p class="font-mono font-normal"><?php echo $row['nama_kota_asal']?></p>
                      -
                      <p class="font-mono font-normal"><?php echo $row['nama_kota_tuju']?></p>
                    </div>
                  </h4>
                  <h4 class="flex font-bold">
                    Harga: 
                    <p class="font-normal ml-2"><?php echo $row['harga']?></p>
                  </h4>
                  <div class="modal-action">
                    <form method="dialog">
                      <!-- if there is a button in form, it will close the modal -->
                      <button class="btn">Close</button>
                    </form>
                  </div>
                </div>
              </dialog>
            </div>
          </div>
        </div>
        <?php //echo $row['id_pemesanan']?>
      <?php } ?>
    </div>
  </main>
  <div class="mt-4">
    <?php include 'components/footer.php' ?>
  </div>
</body>

</html>