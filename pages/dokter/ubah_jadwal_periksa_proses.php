<?php
  include "../../conf/conn.php";
  if($_POST){$id = $_POST['id'];
    
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $query = ("UPDATE jadwal_periksa SET hari='$hari',jam_mulai='$jam_mulai',jam_selesai='$jam_selesai' WHERE id ='$id'");
    if(!mysqli_query($conn,$query)){die(mysql_error);
    }else{
        echo '<script>alert("Data Berhasil Diubah !!!");window.location.href="../../index_dokter.php?page=jadwal_periksa"</script>';}}
?>