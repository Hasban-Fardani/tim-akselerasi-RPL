<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp | Travel Kuy</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body class="min-h-screen flex flex-col justify-center bg-blue-200">
  <main class="flex-grow flex flex-col justify-center items-center">
    <?php
    $err_msg = $_GET["msg"];
    if (isset($_GET['msg'])) {
      echo
        '<div class="alert alert-error">' .
        '<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>' .
        '<span>' . htmlspecialchars($_GET['msg']) . '</span>' .
        '</div>';
    }
    if (isset($_GET['redirect'])) {

    }
    ?>
    <div class="card shadow-xl p-6 bg-white mt-6">
      <h1 class="text-2xl font-bold text-center">Buat Akun</h1>
      <form class=" form-control mt-3" action="/controller/signup_controller.php">
        <label class="label">Nama Lengkap</label>
        <input class="input input-bordered" type="text" name="nama_lengkap" placeholder="Tulis nama lengkap" required>

        <label class="label">Username</label>
        <input class="input input-bordered" type="text" name="username" placeholder="Tulis Username" required>

        <label class="label">Jenis Kelamin</label>
        <div class="flex gap-2">
          <label class="flex justify-center gap-1">
            <input class="radio" type="radio" name="jk" class="radio checked:bg-blue-600">
            <span class="label-text">Laki Laki</span>
          </label>
          <label class="flex justify-center gap-1">
            <input class="radio" type="radio" name="jk" class="radio checked:bg-pink-600">
            <span class="label-text">Perempuan</span>
          </label>
        </div>


        <label class="label">Tanggal Lahir</label>
        <input class="input input-bordered" type="date" name="username" placeholder="Masukkan nama lengkap" required>

        <label class="label">Asal kota</label>
        <select class="input input-bordered" name="kota" id="">
          <?php
          require 'utils/connection.php';
          $res = mysqli_query($con, "SELECT * FROM tb_kota");
          while ($row = mysqli_fetch_assoc($res)) {
            echo '<option value="' . $row["id_kota"] . '">';
            echo $row['nama_kota'];
            echo '</option>';
          }
          ?>
        </select>

        <label class="label">Password</label>
        <input class="input input-bordered" type="password" name="password" id="">

        <span class="mt-3">Sudah punya akun? <a class="text-blue-700 hover:text-blue-300"
            href="/login.php">Login</a></span>
        <button class="btn btn-primary mt-6" type="submit">SignUp</button>
      </form>

    </div>
  </main>
  <footer class="text-center mt-6">
    Copyright Hasban @2023
  </footer>
</body>

</html>