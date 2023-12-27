<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Jadwal Periksa
      </h1>
      <ol class="breadcrumb">
        <li><a href="index_dokter.php"><i class="fa fa-dashboard"></i> HOME </a></li>
        <li class="active"> | Jadwal periksa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          </div>
            <br>
            <div class="box-body table-responsive">
              <table id="jadwal_periksa" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Dokter</th>
                  <th>Hari</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($conn,"SELECT * FROM jadwal_periksa INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id_dokter WHERE jadwal_periksa.id_dokter = dokter.id_dokter ORDER BY dokter.id_dokter DESC");
                //echo $query;
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $row['hari'];?></td>
                  <td><?php echo $row['jam_mulai'];?></td>
                  <td><?php echo $row['jam_selesai'];?></td>
                  <td>
                    <a href="index_dokter.php?page=ubah_jadwal_periksa&id=<?=$row['id'];?>" class="btn btn-success" role="button" title="Ubah Data">Edit<i class="glyphicon glyphicon-edit"></i></a>
                    <a href="pages/dokter/hapus_jadwal_dokter.php?id_dokter=<?=$row['id_dokter'];?>" class="btn btn-danger" role="button" title="Hapus Data">Hapus<i class="glyphicon glyphicon-trash"></i></a>
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