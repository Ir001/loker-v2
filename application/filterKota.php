<?php 

function filterKota($kota)
    {
        $setKota = "";
        if (preg_match_all("/jakarta/i", $kota, $out) OR preg_match_all("/bogor/i", $kota, $out) OR preg_match_all("/depok/i", $kota, $out) OR preg_match_all("/tanggerang/i", $kota, $out) OR preg_match_all("/bekasi/i", $kota, $out)) {
            $setKota = "jabodetabek";
        }elseif(preg_match_all("/aceh/i", $kota, $out)) {
        	$setKota = "aceh";
        }elseif(preg_match_all("/lampung/i", $kota, $out)) {
            $setKota = "lampung";
        }elseif(preg_match_all("/bali/i", $kota, $out)) {
        	$setKota = "bali";
        }elseif (preg_match_all("/bangka belitung/i", $kota, $out)) {
        	$setKota = "bangka belitung";
        }elseif (preg_match_all("/banten/i", $kota, $out)) {
        	$setKota = "banten";
        }elseif (preg_match_all("/bengkulu/i", $kota, $out)) {
        	$setKota = "bengkulu";
        }elseif (preg_match_all("/gorontalo/i", $kota, $out)) {
        	$setKota = "gorontalo";
        }elseif (preg_match_all("/jambi/i", $kota, $out)) {
        	$setKota = "jambi";
        }elseif (preg_match_all("/jawa barat/i", $kota, $out)) {
        	$setKota = "jawa barat";
        }elseif (preg_match_all("/jawa tengah/i", $kota, $out)) {
        	$setKota = "jawa tengah";
        }elseif (preg_match_all("/jawa timur/i", $kota, $out)) {
        	$setKota = "jawa timur";
        }elseif (preg_match_all("/kalimantan barat/i", $kota, $out)) {
        	$setKota = "kalimantan barat";
        }elseif (preg_match_all("/kalimantan selatan/i", $kota, $out)) {
        	$setKota = "kalimantan selatan";
        }elseif (preg_match_all("/kalimantan tangah/i", $kota, $out)) {
        	$setKota = "kalimantan tengah";
        }elseif (preg_match_all("/kalimantan timur/i", $kota, $out)) {
        	$setKota = "kalimantan timur";
        }elseif (preg_match_all("/kalimantan utara/i", $kota, $out)) {
        	$setKota = "kalimantan utara";
        }elseif (preg_match_all("/riau/i", $kota, $out)) {
        	$setKota = "riau";
        }elseif (preg_match_all("/maluku utara/i", $kota, $out)) {
        	$setKota = "maluku utara";
        }elseif (preg_match_all("/nusa tenggara barat/i", $kota, $out)) {
        	$setKota = "nusa tenggara barat";
        }elseif (preg_match_all("/nusa tenggara timur/i", $kota, $out)) {
        	$setKota = "nusa tenggara timur";
        }elseif (preg_match_all("/papua/i", $kota, $out)) {
        	$setKota = "papua";
        }elseif (preg_match_all("/sulawesi barat/i", $kota, $out)) {
        	$setKota = "sulawesi barat";
        }elseif (preg_match_all("/sulawesi selatan/i", $kota, $out)) {
        	$setKota = "sulawesi selatan";
        }elseif (preg_match_all("/sulawesi tengah/i", $kota, $out)) {
        	$setKota = "sulawesi tengah";
        }elseif (preg_match_all("/sulawesi tenggara/i", $kota, $out)) {
        	$setKota = "sulawesi tenggara";
        }elseif (preg_match_all("/sulawesi utara/i", $kota, $out)) {
        	$setKota = "sulawesi utara";
        }elseif (preg_match_all("/sumatra barat/i", $kota, $out) OR preg_match_all("/sumatera barat/i", $kota, $out)) {
        	$setKota = "sumatra barat";
        }elseif (preg_match_all("/sumatra selatan/i", $kota, $out) OR preg_match_all("/sumatera selatan/i", $kota, $out)) {
        	$setKota = "sumatra barat";
        }elseif (preg_match_all("/sumatra utara/i", $kota, $out) OR preg_match_all("/sumatera utara/i", $kota, $out)) {
        	$setKota = "sumatra utara";
        }elseif (preg_match_all("/yogyakarta/i", $kota, $out) OR preg_match_all("/jogja/i", $kota, $out)) {
        	$setKota = "yogyakarta";
        }else{
        	$setKota = "lainya";
        }

        return $setKota;
    }
