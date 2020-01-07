<?php 
	include 'Admin.php';
	if (isset($_POST['form'])) {
		$form = $_POST['form'];
		if ($form == 'setting') {
			$update = 1;
			//
			$title = $_POST['judul'];
			$base_url = $_POST['base_url'];
			$tag_line = $_POST['tag_line'];
			$description = $_POST['deskripsi'];
			$keywords = $_POST['keyword'];
			$tag_manager = $_POST['tag_manager'];
			$adsense = $_POST['adsense'];
			$kd_location = $_POST['kd_location'];
			$auto_grab = $_POST['auto_grab'];
			$update = $su->updateSetting($title, $base_url, $tag_line, $description, $keywords, $tag_manager, $adsense,$kd_location, $auto_grab);
			if ($update) {
				$msg['success'] = true;
				$msg['message'] = 'Berhasil menyimpan pengaturan';
			}else{
				$msg['success'] = false;
				$msg['message'] = 'Gagal menyimpan pengaturan';
			}
			echo json_encode($msg);
		}elseif ($form == "delete_artikel") {
			print_r($_POST);
		}elseif($form == 'add_iklan'){
			$name = $_POST['name'];
			$sc = $_POST['sc'];
			$desc = $_POST['desc'];
			$show = $_POST['show'];
			print_r($su->addAds($name, $sc, $desc, $show));
		}
	}elseif (isset($_POST['setContent'])) {
		$judul = trim($_POST['judul']);
		$content = trim($_POST['content']);
		$type = trim($_POST['type']);
		$data = array(
			'judul' => $judul,
			'content' => $content,
			'type' => $type,
		);
		$setContent = $su->setContent($data);
		echo json_encode($setContent);
	}
 ?>