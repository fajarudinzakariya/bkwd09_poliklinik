<?php
    include "../../conf/conn.php";
    $id = $_GET['id'];
    $query = ("DELETE FROM obat WHERE id ='$id'");
    if(!mysqli_query($conn,$query)){
        die(mysql_error);
    }else{
        echo '<script>alert("Data Berhasil Dihapus !!!");
		window.location.href="../../index.php?page=data_obat"</script>';
	}
?>