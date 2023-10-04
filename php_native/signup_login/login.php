<?php
$redirect = $_GET['redirect'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | Travel Kuy</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="stylesheet" href="assets/style.css">
</head>

<body class="min-h-screen flex flex-col items-center justify-center bg-blue-200">
  <main class="flex-grow flex flex-col justify-center items-center">
    <?php
    $err_msg = $_GET["msg"];
    if (isset($_GET['msg'])) {
      echo
      '<div class="alert alert-error">'.
      '<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'.
      '<span>'. htmlspecialchars($_GET['msg']) .'</span>'.
      '</div>';
    }
    ?>
    <div class="card bg-white shadow-xl p-6 mt-10">
      <h1 class="text-center text-2xl font-bold">Login</h1>
      <form action="/controller/login_controller.php <?php echo $redirect ? "?redirect="+$redirect : ""?>" method="post" class="form-control card">
        <label class="label">
          Username
        </label>
        <input type="text" name="username" class="input input-bordered" placeholder="Masukkan username">
        <label class="label">
          Password
        </label>
        <input type="password" name="password" class="input input-bordered" placeholder="Masukkan passord">
        <span class="mt-3">Belum punya akun? <a class="text-blue-600 hover:text-blue-300" href="/signup.php">SignUp</a></span>
        <button type="submit" class="mt-6 btn btn-primary">Login</button>
      </form>
    </div>
  </main>

  <footer class="mt-auto text-center">
    Copyright Hasban @2023
  </footer>
</body>

</html>