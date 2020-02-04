<?php 
	session_start();
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
	}elseif (isset($_POST['changeName'])) {
		$fullname = htmlspecialchars($_POST['username']);
		$id = htmlspecialchars($_POST['admin_id']);
		$update = $su->updateNama($fullname, $id);
		if ($update) {
			$_SESSION['admin']['fullname'] = $fullname;			
			$msg['status'] = true;
			$msg['message'] = "Berhasil mengubah nama";
		}else{
			$msg['status'] = false;
			$msg['message'] = "Error saat mengubah nama";
		}
		header("Content-Type:application/json");
		echo json_encode($msg, JSON_PRETTY_PRINT);
	}elseif (isset($_POST['changePwd'])) {
		$id = htmlspecialchars($_POST['admin_id']);
		$old_password = htmlspecialchars($_POST['password']);
		$new_password = htmlspecialchars($_POST['new_password']);
		$confirm_password = htmlspecialchars($_POST['repassword']);
		if ($su->checkPwd($old_password, $id)) {
			if ($new_password == $confirm_password) {
				$update = $su->updatePwd($new_password, $id);
				if ($update) {
					$msg['status'] = true;
					$msg['message'] = "Berhasil mengubah password!";
				}else{
					$msg['status'] = false;
					$msg['message'] = "Error saat mengubah password!";
				}
			}else{
				$msg['status'] = false;
				$msg['message'] = "Konfirmasi tidak cocok!";
			}
			
		}else{
			$msg['status'] = false;
			$msg['message'] = "Kata sandi sekarang tidak cocok!";
		}
		header("Content-Type:application/json");
		echo json_encode($msg, JSON_PRETTY_PRINT);
	}else{
		// header("Content-Type:application/json");
		$msg['status'] = false;
		$msg['message'] = "Woy! Thats Illegal";
		echo json_encode($msg);
	}
 ?>