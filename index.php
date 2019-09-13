<?php 
	require 'application/grab.php';
	date_default_timezone_set('Asia/Jakarta');
	if(isset($_GET['post']) && isset($_GET['id'])){
	    $judul = $_GET['post'];
	    $id = $_GET['id'];
	    $dataPost = $myApp->showDetail($judul,$id);
	}else{
	    $url = 'http://www.jobstreet.co.id/id/job-search/job-vacancy.php';
	    $aksi = "cari";
	    $dataPost = '';
	}
	if (isset($_GET['page'])) {
		switch ($_GET['page']) {
			case 'lowongan':
				include 'detail.php';
				break;
			
			default:
				include 'index_home.php';
				break;
		}
	}else{
		include 'index_home.php';
	}

 ?>
