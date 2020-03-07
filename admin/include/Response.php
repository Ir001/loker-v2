<?php 
	require 'Admin.php';
	if (isset($_POST['grab'])) {
		$id_location  = $_POST['location']; 
		$page  = $_POST['pg'];
		for ($i = 0; $i < ob_get_level(); $i++) {//for each open buffer
		  ob_end_flush();//close it
		}
		// $i=1;
		ob_implicit_flush(1);
		// while ($i <= $page) {
		if ($page > 1) {
			$sleep = 5*$page;
			sleep($sleep);
		}
		$grab = $su->grabing($id_location, $page);
		foreach ($grab as $grab) {
			if ($grab['status'] == 'success') {
				echo "<p> <span class='badge badge-success'>Success</span> Page  ".$page." : ".$grab['title']." <span class='badge badge-primary'>[".ucwords($grab['kota'])."]</span></p>";
			}else{
				echo "<p> <span class='badge badge-danger'>Sudah Terdaftar</span> Page  ".$page." : ".$grab['title']."  <span class='badge badge-primary'>[".ucwords($grab['kota'])."]</span></p>";
			}
			$total = @$total+count($grab['status']);
		}
		// $i++;
		// }
		echo "<p>Total Page $page :<b>$total</b></p>";
	}
	// 
	if (isset($_POST['update'])) {
		# code...
		$update = $su->checkExpired();
		$data['success'] = true;
		$data['total'] = $update;
		header("Content-Type:application/json");
		echo json_encode($data, JSON_PRETTY_PRINT);
	}
 ?>