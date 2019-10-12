<?php 
	// require 'application/grab.php';
	require 'application/grab-v2.php';
	date_default_timezone_set('Asia/Jakarta');
	if(isset($_GET['post']) && isset($_GET['id'])){
	    $judul = $_GET['post'];
	    $id = $_GET['id'];
	    $dataPost = $myApp->showDetail($judul,$id);
	}else{
	    $url = 'http://www.jobstreet.co.id/id/job-search/job-vacancy.php?ojs=6';
	    $aksi = "";
	    //$myApp->insert($url, $aksi);
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
