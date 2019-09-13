<?php
	$now = date('Y-M-d');
	function convertDate($month = "Ditayangkan : 01-January-2019"){
		$month = $month;
		if (preg_match('/Tutup/i', $month)) {
			$string1 = explode("pada", $month);
		}elseif (preg_match('/Ditayangkan/i', $month)) {
			$string1 = explode(":", $month);
		}else{
			$string1 = explode(" ", $month);
		}
		$string2 = explode("-", $string1[1]);
		$year = trim($string2[2]);
		$tanggal = trim($string2[0]);
		$real_month = strtolower($string2[1]);
		if (preg_match('/january/i', $real_month)) {
			$date = $year."-01"."-".$tanggal;
		}elseif (preg_match('/february/i', $real_month)) {
			$date = $year."-02"."-".$tanggal;
		}elseif (preg_match('/march/i', $real_month)) {
			$date = $year."-03"."-".$tanggal;
		}elseif (preg_match('/april/i', $real_month)) {
			$date = $year."-04"."-".$tanggal;
		}elseif (preg_match('/may/i', $real_month)) {
			$date = $year."-05"."-".$tanggal;
		}elseif (preg_match('/june/i', $real_month)) {
			$date = $year."-06"."-".$tanggal;
		}elseif (preg_match('/july/i', $real_month)) {
			$date = $year."-07"."-".$tanggal;
		}elseif (preg_match('/august/i', $real_month)) {
			$date = $year."-08"."-".$tanggal;
		}elseif (preg_match('/september/i', $real_month)) {
			$date = $year."-09"."-".$tanggal;
		}elseif (preg_match('/october/i', $real_month)) {
			$date = $year."-10"."-".$tanggal;
		}elseif (preg_match('/november/i', $real_month)) {
			$date = $year."-11"."-".$tanggal;
		}elseif (preg_match('/december/i', $real_month)) {
			$date = $year."-12"."-".$tanggal;
		}else{
			$date = date("Y-m-d");
		}
		return $date;
	}
 ?>