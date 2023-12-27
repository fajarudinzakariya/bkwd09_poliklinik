<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>DATA DOKTER</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">

      <form role="form" method="post" action="pages/dokter/tambah_dokter_proses.php">
        <div class="box-body">  
          <div class="form-group">
            <label>NAMA</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
          </div>
          <div class="form-group">
            <label>ALAMAT</label>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
          </div>
          <div class="form-group">
            <label>NO. HP</label>
            <input type="text" name="no_hp" class="form-control" placeholder="NO. HP" required>
          </div>

          <?php
          include  "conf/conn.php";
          $sql="SELECT id, nama_poli FROM poli";
          //echo $sql;
          $query = "SELECT id, nama_poli FROM poli";
          $result = $conn->query($query);

          $poli_options = [];
          while ($row = $result->fetch_assoc()) {
          $poli_options[$row['id']] = $row['nama_poli'];
          }
          $conn->close(); ?>
          <div class="form-group">
          <label>POLI</label>
          <select name="poli" class="form-control" placeholder="Poli" required>
            <?php foreach ($poli_options as $id => $nama_poli) {
                echo '<option value="' . $id . '">' . $nama_poli . '</option>';} ?>
          </select>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i>Simpan</button>
        </div>
        <br>
        <div class="box-header">
          <button type="reset" class="btn btn-secondary" role="button" title="Reset Data" value="Reset"><i class="glyphicon glyphicon-plus"></i>Reset</a>
        </div>
      </form>

        <br>
            <div class="box-body table-responsive">
              <table id="obat" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>NAMA DOKTER</th>
                  <th>ALAMAT</th>
                  <th>NO. HP</th>
                  <th>POLI</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($conn,"SELECT * FROM dokter INNER JOIN poli ON dokter.id_poli = poli.id WHERE dokter.id_poli = poli.id ORDER BY dokter.id_dokter DESC");
                //echo $query;
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $row['alamat'];?></td>
                  <td><?php echo $row['no_hp'];?></td>
                  <td><?php echo $row['nama_poli'];?></td>
                  <td>
                    <a href="index_admin.php?page=ubah_dokter&id_dokter=<?=$row['id_dokter'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i>Ubah</a>
                    <a href="pages/dokter/hapus_dokter.php?id_dokter=<?=$row['id_dokter'];?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
                  </td>
                </tr>

                <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#obat').DataTable();
  });
</script>