<?php
    include "../../conf/conn.php";
    if($_POST){
        $id = $_POST['id'];
        $nama_obat = $_POST['nama_obat'];
        $kemasan = $_POST['kemasan'];
        $harga = $_POST['harga'];
        $query = ("INSERT INTO obat(id,nama_obat,kemasan,harga) 
           VALUES ('".$id."','".$nama_obat."','".$kemasan."','".$harga."')");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../../index_admin.php?page=data_obat"</script>';
        }
    }
?>