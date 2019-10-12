<?php 

	$waktu_awal = trim($waktu_awal);
	$string_a = explode("-", $waktu_awal);
	$tgl_exp = explode(" ", $string_a[0]);
	//
	$status = strtolower($tgl_exp[0]);
	// Tahun
	$tahun = $string_a[2];
	$tahun = trim($tahun);
	// Bulan
	$bulan_string = strtolower($string_a[1]);
	if ($bulan_string == "january") {
		$bulan = "01";
	}elseif($bulan_string == "february"){
		$bulan = "02";
	}elseif($bulan_string == "march"){
		$bulan = "03";
	}elseif($bulan_string == "april"){
		$bulan = "04";
	}elseif($bulan_string == "may"){
		$bulan = "05";
	}elseif($bulan_string == "june"){
		$bulan = "06";
	}elseif($bulan_string == "july"){
		$bulan = "07";
	}elseif($bulan_string == "august"){
		$bulan = "08";
	}elseif($bulan_string == "september"){
		$bulan = "09";
	}elseif($bulan_string == "october"){
		$bulan = "10";
	}elseif($bulan_string == "november"){
		$bulan = "11";
	}elseif($bulan_string == "december"){
		$bulan = "12";
	}else{
		$bulan = "01";
	}
	// Tanggal
	if ($status == "ditayangkan:") {
		$tanggal = $tgl_exp[1];
	}else{
		$tanggal = $tgl_exp[3];
	}
	$waktu = "$tahun-$bulan-$tanggal";
	$waktu = trim($waktu);
	echo $waktu;
 ?>