<?php
session_start();
if (!$_SESSION['username']) {
  header('Location: index.html');
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Buku Tamu</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <?php echo $_SESSION['username'] ?>
            </a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Pages
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="dashboard.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Tamu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit Tamu</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dasboard.php">Home</a></li>
                <li class="breadcrumb-item active">Edit</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="card card-info container-fluid">
              <div class="card-header">
                <h1 class="card-title">Tambahkan Tamu</h1>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="update-bukutamu.php" method="post" enctype="multipart/form-data">
                <?php
                include 'koneksi.php';
                $id_tamu = $_GET['id_tamu'];
                $query = mysqli_query($con, "SELECT * FROM tbl_tamu WHERE id_tamu='$id_tamu'");
                while ($row = mysqli_fetch_assoc($query)) {
                  ?>
                  <input type="text" style="display:none;" name="id_tamu" value="<?php echo $row['id_tamu'] ?>">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"
                          value="<?php echo $row['nama'] ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="telp" class="col-sm-2 col-form-label">No Telp</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="telp" id="telp" placeholder="No. Telp"
                          value="<?php echo $row['telp'] ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="Email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="Email" class="form-control" name="email" id="email" placeholder="Email"
                          value="<?php echo $row['email'] ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="status" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <select name="status" id="Status" class="form-control form-select">
                          <option value="Guru" <?php if ($row['status'] == "Guru")
                            echo "selected"; ?>>Guru</option>
                          <option value="Pegawai" <?php if ($row['status'] == "Pegawai")
                            echo "selected"; ?>>Pegawai
                          </option>
                          <option value="Siswa" <?php if ($row['status'] == "Siswa")
                            echo "selected"; ?>>Siswa</option>
                          <option value="Alumni" <?php if ($row['status'] == "Alumni")
                            echo "selected"; ?>>Alumni</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="Status" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-10 ">
                        <input type="radio" name="jk" id="" value="laki-laki" <?php if ($row['jk'] == 'laki-laki') {
                          echo 'checked';
                        } ?>>
                        <label for="" class="font-weight-normal">Laki-laki</label>
                        <input type="radio" name="jk" id="" value="perempuan" <?php if ($row['jk'] == 'perempuan') {
                          echo 'checked';
                        } ?> class="ml-2">
                        <label for="" class="font-weight-normal">Perempuan</label>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="Status" class="col-sm-2 col-form-label">Hubungan</label>
                      <div class="col-sm-10 ">
                        <?php
                        // $id_tamu = $row['id_tamu'];
                        // $result2 = $con->query("SELECT * FROM tbl_hubungan WHERE id_tamu='$id_tamu'");
                        // echo "arr: " .  $result2->fetch_all()[1];
                        ?>
                        <?php
                        $hub = $con->query("SELECT hubungan FROM tbl_hubungan WHERE id_tamu='$id_tamu'");
                        $data = array();
                        // Loop melalui hasil query dan tambahkan nilai ke dalam array
                        foreach ($hub->fetch_all() as $dat) {
                          array_push($data, $dat[0]);
                        }
                        ?>
                        <input type="checkbox" name="hubungan[]" id="" value="teman sd" <?php if (in_array('teman sd', $data)) {
                          echo 'checked';
                        } ?>>
                        <label for="" class="font-weight-normal">Teman SD</label>
                        <input type="checkbox" name="hubungan[]" id="" value="teman smp" <?php if (in_array('teman smp', $data)) {
                          echo 'checked';
                        } ?> class="ml-2">
                        <label for="" class="font-weight-normal">Teman SMP</label>
                        <input type="checkbox" name="hubungan[]" id="" value="teman smk" <?php if (in_array('teman smk', $data)) {
                          echo 'checked';
                        } ?> class="ml-2">
                        <label for="" class="font-weight-normal">Teman SMK</label>
                        <input type="checkbox" name="hubungan[]" id="" value="lainnya" <?php if (in_array('lainnya', $data)) {
                          echo 'checked';
                        } ?> class="ml-2">
                        <label for="" class="font-weight-normal">Lainnya</label>
                      </div>

                    </div>

                    <div class="form-group row">
                      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="alamat"
                          class="form-control"><?php echo $row['alamat'] ?></textarea>
                        <!-- <input type="password" class="form-control" name="alamat" id="Alamat" placeholder="Password"> -->
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                      <div class="col-sm-10 ">
                        <img width="50"
                          src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['foto']); ?>"
                          alt="Gambar">
                        <input type="file" name="foto" id="" class="ml-3">
                      </div>
                    </div>
                  </div>



                <?php } ?>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Admin Buku Tamu</h5>
        <p>Sidebar</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Admin Buku Tamu
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/adminlte.min.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/adminlte.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>