<?php 
	include 'Admin.php';
	if (isset($_POST['form'])) {
		$form = $_POST['form'];
		if ($form == 'setting') {
			$update = 1;
			//
			print_r($_POST);
			$title = $_POST['judul'];
			$tag_line = $_POST['tag_line'];
			$description = $_POST['deskripsi'];
			$keywords = $_POST['keyword'];
			$tag_manager = $_POST['tag_manager'];
			$adsense = $_POST['adsense'];
			$update = $su->updateSetting($title, $tag_line, $description, $keywords, $tag_manager, $adsense);
			if ($update == 1) {
				echo "success";
			}else{
				echo "error";
			}
		}
	}
 ?>