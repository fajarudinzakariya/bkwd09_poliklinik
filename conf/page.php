<?php
	if(isset($_GET['page'])){
		$page=$_GET['page'];
		//var_dump($page);
		switch ($page){
		    case 'data_obat': 
			   include "pages/obat/data_obat.php";
			   break; 
        case 'tambah_obat':
                include 'pages/obat/tambah_obat.php';
                break;
        case 'ubah_obat';
                include 'pages/obat/ubah_obat.php';
                break;  
		}
	}if(isset($_GET['page'])){
		$page=$_GET['page'];
		//var_dump($page);
		switch ($page){
		    case 'data_dokter': 
			   include "pages/dokter/data_dokter.php";
			   break; 
        case 'tambah_dokter':
                include 'pages/dokter/tambah_dokter.php';
                break;
        case 'ubah_dokter';
                include 'pages/dokter/ubah_dokter.php';
                break;
		case 'jadwal_periksa';
				include 'pages/dokter/jadwal_periksa.php';
				break;
		case 'ubah_jadwal_periksa';
				include 'pages/dokter/ubah_jadwal_periksa.php';
				break;		
		}
		
	}if(isset($_GET['page'])){
		$page=$_GET['page'];
		//var_dump($page);
		switch ($page){
		    case 'data_pasien': 
			   include "pages/pasien/data_pasien.php";
			   break; 
        case 'tambah_pasien':
                include 'pages/pasien/tambah_pasien.php';
                break;
        case 'ubah_pasien';
                include 'pages/pasien/ubah_pasien.php';
                break;  
		case 'riwayat_pasien';
				include 'pages/pasien/riwayat_pasien.php';
				break;
		case 'detail_riwayat_pasien';
				include 'pages/pasien/detail_riwayat_pasien.php';
				break;
		} 
	} else{
		include 'pages/home.php';
	}

?>