<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>DATA OBAT</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">

      <form role="form" method="post" action="pages/obat/tambah_obat_proses.php">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Obat</label>
                  <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat" required>
                </div>
                <div class="form-group">
                  <label>Kemasan</label>
                  <input type="text" name="kemasan" class="form-control" placeholder="kemasan" required>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" name="harga" class="form-control" placeholder="harga" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
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
                  <th>NAMA OBAT</th>
                  <th>KEMASAN</th>
                  <th>HARGA</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($conn,"SELECT * FROM obat ORDER BY id DESC");
                //echo $query;
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama_obat'];?></td>
                  <td><?php echo $row['kemasan'];?></td>
                  <td><?php echo $row['harga'];?></td>
                  <td>
                    <a href="index_admin.php?page=ubah_obat&id=<?=$row['id'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i>Ubah</a>
                    <a href="pages/obat/hapus_obat.php?id=<?=$row['id'];?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
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