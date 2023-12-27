<?php
    include "../../conf/conn.php";
    if($_POST){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $poli = $_POST['poli'];
        $query = ("INSERT INTO dokter(nama,alamat,no_hp,id_poli) 
           VALUES ('".$nama."','".$alamat."','".$no_hp."','".$poli."')");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../../index_admin.php?page=data_dokter"</script>';
        }
    }
?>