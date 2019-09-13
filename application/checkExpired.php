<?php 
	function checkExpired($date){
		date_default_timezone_set('Asia/Jakarta');
		$conn = new mysqli('localhost','root','', 'loker');
		$conn = new mysqli('localhost','root','root', 'loker');
		$data = array();
		$date = $date;
		$now = date("Y-m-d");
		// Query 
		$count = "SELECT count(id_lowongan) FROM td_lowongan WHERE dateTutup < '$date'";
		$queryCount = $conn->query($count);
		$dataCount = $queryCount->fetch_assoc();
		$jumlah = $dataCount['count(id_lowongan)'];
		$sql = "DELETE FROM td_lowongan WHERE dateTutup < '$date'";
		$count = "SELECT count(id_lowongan) FROM td_lowongan WHERE date_tutup < '$date'";
		$queryCount = $conn->query($count);
		$dataCount = $queryCount->fetch_assoc();
		$jumlah = $dataCount['count(id_lowongan)'];
		$sql = "DELETE FROM td_lowongan WHERE date_tutup < '$date'";
		// Detail data
		$a = explode("-", $date);
		$year = $a[0];
		$month = $a[1];
		$tanggal = $a[2];
		// Detail date now
		$b = explode("-", $now);
		$y = $b[0]; 
		$m = $b[1]; 
		$t = $b[2];
		 // Checking
		if ($y == $year AND $m == $month) {
			if ($tanggal < $t) {
				// $conn->query($sql);
				$conn->query($sql);
				$data['type'] = 'success';
				$data['jumlah'] = $jumlah;
			}else{
				$data['type'] = 'error';
			}
		}else{
			if ($year < $y || $month < $m) {
				// $conn->query($sql);
				$conn->query($sql);
				$data['type'] = 'success';
				$data['jumlah'] = $jumlah;
			}else{
				$data['type'] = 'error';
			}
		} 
		return $data;
	}
	print_r(checkExpired());
	$now = date('Y-m-d');
	print_r(checkExpired($now));
 ?>