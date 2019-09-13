<?php 
	include 'convertDate.php';
<<<<<<< HEAD
	$conn = new mysqli('localhost','root','','loker');
=======
	$conn = new mysqli('localhost','root','root','loker');
>>>>>>> 22f39b7278d95ce20437cd1bbc1ff84bbd322400
	// 
	$sql = "SELECT id_lowongan,dibuka, ditutup FROM td_lowongan WHERE 1";
	$query = mysqli_query($conn, $sql);
	while ($data = mysqli_fetch_assoc($query)) {
		// print_r($data);
		$id = $data['id_lowongan'];
		$dibuka = @$data['dibuka']?$data['dibuka']:"Ditayangkan :". date('Y-M-d');
		$dateBuka = convertDate($dibuka);
		$ditutup = @$data['ditutup']?$data['ditutup']:"Ditutup pada ". date('Y-M-d');
		$dateTutup = convertDate($ditutup);
<<<<<<< HEAD
		$sql2 = "UPDATE td_lowongan SET dateBuka = '$dateBuka', dateTutup = '$dateTutup' WHERE id_lowongan = $id";
=======
		$sql2 = "UPDATE td_lowongan SET date_buka = '$dateBuka', date_tutup = '$dateTutup' WHERE id_lowongan = $id";
>>>>>>> 22f39b7278d95ce20437cd1bbc1ff84bbd322400
		$exec = mysqli_query($conn, $sql2);

		echo "Done changing date id {$id} {$dibuka} - {$ditutup} </br>";
		echo $sql2."<br/>";
	}

 ?>