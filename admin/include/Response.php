<?php 
	require 'Admin.php';
	if (isset($_POST['grab'])) {
		$id_location  = $_POST['location'];
		$page  = $_POST['pg'];
		$i=1;
		while ($i <= $page) {
			$grab = $su->grabing($id_location, $i);
			foreach ($grab as $grab) {
				if ($grab['status'] == 'success') {
					echo "<p> <span class='badge badge-success'>Success</span> Page  ".$i." : ".$grab['title']." <span class='badge badge-primary'>[".ucwords($grab['kota'])."]</span></p>";
				}else{
					echo "<p> <span class='badge badge-danger'>Sudah Terdaftar</span> Page  ".$i." : ".$grab['title']."  <span class='badge badge-primary'>[".ucwords($grab['kota'])."]</span></p>";
				}
				$total = @$total+count($grab['status']);
			}
			$i++;
		}
		echo "<p>Total :<b>$total</b></p>";
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