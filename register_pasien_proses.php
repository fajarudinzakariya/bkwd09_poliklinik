<?php
    include "conf/conn.php";
    if($_POST){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_ktp = $_POST['no_ktp'];
        $no_hp = $_POST['no_hp'];
        $query = ("INSERT INTO pasien (nama,alamat,no_ktp,no_hp) 
           VALUES ('".$nama."','".$alamat."','".$no_ktp."','".$no_hp."')");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../../index.php?page=data_obat"</script>';
        }
    }
?>