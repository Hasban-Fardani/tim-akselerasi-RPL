<?php
require 'utils/connection.php';

session_start();
$usr_id = $_SESSION['usr_id'];
$name = "";
if (isset($usr_id)){
  $res = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$usr_id'");
  $row = mysqli_fetch_assoc($res);
  $name = $row['nama_pelanggan'];
}

$res = $con->query("SELECT * FROM tb_kota");
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
  <?php include 'components/header.php'; ?>
  <main class="flex-grow">
    <h1 class="text-4xl font-semibold mt-16 text-center">Cari Tiket Termurah Hari ini</h1>
    <div class="mt-10">
      <form action="/search.php" method="get" class="bg-white rounded-lg p-4">
        <div class="flex flex-row gap-2">
          <div class="flex-grow">
            <label for="kotaInput" class="block text-gray-700 font-bold mb-2">Kota Asal</label>
            <select name="id_kota_asal" id="kotaInput" required
              class="input input-bordered w-full py-2 px-3 focus:outline-none focus:border-blue-500">
              <option value="" disabled selected>Pilih Kota Asal</option>
              <?php
              while ($row = $res->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['id_kota'] ?>">
                  <?php echo $row['nama_kota'] ?>
                </option>
              <?php } ?>
              <!-- Tambahkan lebih banyak kota di sini -->
            </select>
          </div>
          <div class="flex-grow">
            <label for="kotaInput2" class="block text-gray-700 font-bold mb-2">Kota Tujuan</label>
            <select name="id_kota_tuju" id="kotaInput2" required
              class="input input-bordered w-full py-2 px-3 focus:outline-none focus:border-blue-500">
              <option value="" disabled selected>Pilih Kota Tujuan</option>
              <?php
              $res2 = $con->query("SELECT * FROM tb_kota");
              while ($row2 = $res2->fetch_assoc()) {
                ?>
                <option value="<?php echo $row2['id_kota'] ?>">
                  <?php echo $row2['nama_kota'] ?>
                </option>
              <?php } ?>
              <!-- Tambahkan lebih banyak kota di sini -->
            </select>
          </div>
          <div class="flex-grow">
            <label class="block text-gray-700 font-bold mb-2">Tanggal Berangkatan</label>
            <input type="date" name="waktu_berangkat" id="" required
              class="input input-bordered w-full py-2 px-3 focus:outline-none focus:border-blue-500">
          </div>
        </div>
        <div class="mt-4 flex justify-center items-center">
          <button type="submit" class="btn btn-primary px-8 py-2">Cari</button>
        </div>
      </form>
    </div>
  </main>

  <?php include 'components/footer.php'; ?>

  <script src="assets/script.js"></script>
</body>

</html>