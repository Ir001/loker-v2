<?php 
	require_once('Admin.php');
	/**/
	header("Content-Type:application/json");
	if (isset($_POST['delete_artikel'])) {
		$id = $_POST['id'];
		$delete = $su->delete_artikel($id);
		echo json_encode($delete);
	}else{
		$json['success'] = false; 
		$json['message'] = 'Forbiden Request';
		echo json_encode($json);
	}
 ?>