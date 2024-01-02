<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Pasien</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    .register-card-body {
      position: relative;
      border-radius: 5px; /* This will make the element rounded */
      overflow: hidden; /* This will hide the left and right outline */
    }

    .register-card-body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      border-top: 6px solid #3081D0; /* This will give a more prominent border effect on the top */
    }

    .register-card-body::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      border-bottom: 1px solid #3081D0; /* This will give a more prominent border effect on the bottom */
    }
  </style>
</head>
<body class="hold-transition register-page">
  <div class="card">
  <div class="register-box">
    <div class="card-body register-card-body">
    <div class="register-logo">
    <a href="index2.html"><b>Poli</b>klinik</a>
  </div>
      <p class="login-box-msg">Register a new account</p>

      <form action="register_pasien_proses.php" method="post">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nama" name="nama">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Alamat" name="alamat">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-home"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="No KTP" name="no_ktp">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-id-card"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="No HP" name="no_hp">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-phone"></span>
            </div>
        </div>
    </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="login.html" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
