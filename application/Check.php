<?php 

	function updateDate(){
		$sql  = "SELECT id_lowongan,dibuka, ditutup FROM td_lowongan WHERE 1=1";
		$exec = $this->query($sql);
		while ($result = $exec->fetch_assoc()) {
			$id_lowongan = $result['id_lowongan'];
			$dibuka = convertDate($result['dibuka']);
			$ditutup = convertDate($result['ditutup']);
			// 
			$update = "UPDATE td_lowongan SET date_buka = '$dibuka', date_tutup = '$ditutup' WHERE id_lowongan = $id_lowongan";
			$query = $this->query($update);

		}
		return 1;
	}
	function checkExpired(){
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d');
		$sql  = "SELECT id_lowongan, date_tutup FROM td_lowongan WHERE 1=1";
		$exec = $this->query($sql);
		$i = 0;
		while ($result = $exec->fetch_assoc()) {
			$deadline = $result['date_tutup'];
			$id_lowongan = $result['id_lowongan'];
			if($deadline < $now){
				$status = 'expired';
			}else{
				$status = 'active';
			}
			$sql = "UPDATE td_lowongan SET status = '$status' WHERE id_lowongan = $id_lowongan";
			$this->query($sql);
			$i++;	
		}
		return 1;
	}
