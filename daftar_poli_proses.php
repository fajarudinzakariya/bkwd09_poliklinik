<?php
    include "conf/conn.php";
    if($_POST){
        $no_rm = $_POST['no_rm'];
        $poli = $_POST['poli'];
        $id= $_POST['id'];
        $keluhan = $_POST['keluhan'];
        $query = ("INSERT INTO daftar_poli (no_rm,poli,id_jadwal,keluhan) 
           VALUES ('".$no_rm."','".$poli."','".$id."','".$keluhan."')");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="daftar_poli.php"</script>';
        }
    }
?>