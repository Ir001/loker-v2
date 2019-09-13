<?php
	include 'filterKota.php'; 
	$conn = mysqli_connect('localhost', 'root', 'root', 'loker');
	// 
	$geLokasi = mysqli_query($conn, "SELECT id_lowongan, lokasi FROM td_lowongan");
	// 
	while ($data = mysqli_fetch_assoc($geLokasi)) {
		$lokasi = $data['lokasi'];
		$id = $data['id_lowongan'];
		$kota = filterKota($lokasi);
		echo $id." ".$lokasi." = Wilayah $kota";
		$sql = "UPDATE td_lowongan SET kota = '$kota' WHERE id_lowongan = $id";
		mysqli_query($conn, $sql);
		echo "<hr>";
	}

 ?>