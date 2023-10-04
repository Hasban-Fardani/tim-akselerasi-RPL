<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.5/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <!-- <div class="container">
    <form class="form-horizontal" action="cekLogin.php" method="POST">
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-5 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="Username">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-5 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <div class="offset-sm-2 col-sm-10">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck2">
              <label class="form-check-label" for="exampleCheck2">Remember me</label>
            </div>
          </div>
        </div>
      </div>
       /.card-body 
      <div class="card-footer">
        <button type="submit" class="btn btn-info">Sign in</button>
        <button type="submit" class="btn btn-default float-right">Cancel</button>
      </div>
       /.card-footer 
    </form>
  </div> -->
  <div class="flex justify-center items-center h-[100vh]">
    <div class="card w-96 bg-base-100 shadow-xl">
      <div class="card-body">
        <form action="cekLogin.php" method="POST">
          <h1 class="text-xl font-bold text-center">Login</h1>
          <label class="label">
            <h2 class="label-text">What is your name?</h2>
          </label>
          <input name="username" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
          <label class="label">
            <h2 class="label-text">Password</h2>
          </label>
          <input password="password" type="password" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
          <button type="submit" class="mt-4 btn btn-active btn-primary">Login</button>
        </form>
        <div class="relative mt-4">
          <a href="" class="absolute">Forgot password?</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>