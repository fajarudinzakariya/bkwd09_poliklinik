<?php
    include "../../conf/conn.php";
    if($_POST){
        $id_dokter = $_POST['id_dokter'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $poli = $_POST['poli'];
        $query = ("UPDATE dokter SET nama = '$nama', alamat = '$alamat', no_hp = '$no_hp', id_poli = '$poli' WHERE id_dokter='$id_dokter'");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="../../index_admin.php?page=data_dokter"</script>';
        }
    }
?>