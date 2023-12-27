<?php
  include "../../conf/conn.php";
  if($_POST){$id = $_POST['id'];
    
    $nama_obat = $_POST['nama_obat'];
    $kemasan = $_POST['kemasan'];
    $harga = $_POST['harga'];
    $query = ("UPDATE obat SET nama_obat='$nama_obat',kemasan='$kemasan',harga='$harga' WHERE id ='$id'");
    if(!mysqli_query($conn,$query)){die(mysql_error);
    }else{
        echo '<script>alert("Data Berhasil Diubah !!!");window.location.href="../../index_admin.php?page=data_obat"</script>';}}
?>