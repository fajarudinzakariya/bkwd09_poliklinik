<?php
include  "conf/conn.php";
$sql="SELECT * FROM jadwal_periksa WHERE id='".$_GET['id']."'";
//echo $sql;
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH Jadwal Periksa
      </h1>
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
            <form role="form" method="post" action="pages/dokter/ubah_jadwal_periksa_proses.php">
              <div class="box-body">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                  <label>Jam Mulai</label>
                  <input type="time" name="jam_mulai" class="form-control" value="<?php echo $row['jam_mulai']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Jam Selesai</label>
                  <input type="time" name="jam_selesai" class="form-control" value="<?php echo $row['jam_selesai']; ?>" required>
                </div>	
                <div class="form-group">
                  <label>Hari</label>
                  <select name="hari" class="form-control" placeholder="Hari" required>
                    <?php 
                      $query1 = "SHOW COLUMNS FROM jadwal_periksa WHERE Field = 'hari'";
                      $result1 = $conn->query($query1);
                      
                      if ($result1->num_rows > 0) {
                          $row = $result1->fetch_assoc();
                          // Parse nilai-nilai dari kolom enum
                          $enum_values = explode(",", str_replace("'", "", substr($row['Type'], 5, -1)));
                      }
                      foreach ($enum_values as $value) {
                      echo '<option value="' . $value . '">' . $value . '</option>';} ?>
                  </select>
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