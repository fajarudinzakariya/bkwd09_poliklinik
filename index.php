<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<header class="bg-primary" style="padding-top: 30px; padding-bottom: 30px;">
  <h1 class="text-center font-weight-bold">Sistem Temu Janji</h1>
  <h1 class="text-center font-weight-bold">Pasien - Dokter</h1>
  <p class="text-center text-secondary">Bimbingan Karir 2023 Bidang Web</p>
</header>
<body>
  <br>
  <div class="container">
    <div class="row">
      <!-- Bagian Kiri -->
      <div class="col-md-6">
        <h1><i class="nav-icon fas fa-user bg-primary text-white p-3 rounded"></i></h1>
        <h2 class="font-weight-bold">Login Sebagai Pasien</h2>
        <p>Apabila anda adalah seorang pasien, silahkan login terlebih dahulu untuk melakukan pendaftaran sebagai pasien!</p>
        <a href="login_pasien.php">Klik Link Berikut <i class="fas fa-arrow-right"></i></a>
      </div>
      
      <!-- Bagian Kanan -->
      <div class="col-md-6">
        <h1><i class="nav-icon fas fa-user bg-primary text-white p-3 rounded"></i></h1>
        <h2 class="font-weight-bold">Login Sebagai Dokter</h2>
        <p>Apabila anda adalah seorang dokter, silahkan login terlebih dahulu untuk melakukan mulai melayani pasien!</p>
        <a href="login_dokter.php">Klik Link Berikut <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>

  <!-- Memuat Bootstrap JavaScript dan dependensi jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
