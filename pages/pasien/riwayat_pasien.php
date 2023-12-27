<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Pasien
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME </a></li>
        <li class="active"> | Riwayat Pasien</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
            <div class="box-body table-responsive">
              <table id="obat" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Pasien</th>
                  <th>Alamat</th>
                  <th>No. KTP</th>
                  <th>No. Telepon</th>
                  <th>No. RM</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($conn,"SELECT * FROM pasien ORDER BY id DESC");
                //echo $query;
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $row['alamat'];?></td>
                  <td><?php echo $row['no_ktp'];?></td>
                  <td><?php echo $row['no_hp'];?></td>
                  <td><?php echo $row['no_rm'];?></td>
                  <td>
                    <a href="index_dokter.php?page=detail_riwayat_pasien&id=<?=$row['id'];?>" class="btn btn-success" role="button" title="Ubah Data">Detail Riwayat Periksa<i class="glyphicon glyphicon-edit"></i></a>
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