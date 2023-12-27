<?php
include  "conf/conn.php";
$sql="SELECT * FROM obat WHERE id='".$_GET['id']."'";
//echo $sql;
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH DATA OBAT
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH OBAT</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="pages/obat/ubah_obat_proses.php">
              <div class="box-body">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                  <label>Nama Obat</label>
                  <input type="text" name="nama_obat" class="form-control"  value="<?php echo $row['nama_obat']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Kemasan</label>
                  <input type="text" name="kemasan" class="form-control" value="<?php echo $row['kemasan']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" name="harga" class="form-control" value="<?php echo $row['harga']; ?>" required>
                </div>				
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->