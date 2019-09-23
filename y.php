<?php

	//Proses get img
	$imgSrc = '<img class="img-company-logo" id="img_company_logo_6" src="https://siva.jsstatic.com/id/25059/images/logo/25059_logo_0_672852.jpg" alt="Lowongan MEKA GROUP">';
	$a = explode("=", $imgSrc);
	$b = $a[3];
	$c = explode("alt", $b);
	$img = str_replace("\"", "", $c[0]);
 ?>