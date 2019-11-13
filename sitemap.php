<?php
include 'application/grab-v2.php';
header('Content-type: application/xml; charset="ISO-8859-1"', true);

/**
 * Created by PhpStorm.
 * User: cat mating
 * Date: 10/11/2016
 * Time: 20.12
 */
$url = "http://" . $_SERVER['HTTP_HOST'];
print_r('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">');
print_r('<url>
            <loc>' . $url . '</loc>
            <priority>1.0</priority>
        </url>');

$param = 'sitemap';
$page  = 1;
$data = $myApp->showArtikel($param,$page);
$i = 0;
foreach ($data as $val) {
    // print_r($data);
    if(isset($data[$i])){
        try {
        $a = explode("-", $data[$i]['judul']);
        $title = $a[0];
        $url_title = trim(str_replace(" ", "+", strtolower($title)),' ');
        $detail = $data[$i]['id_lowongan']."_lowongan_".$url_title.".html";
        $xjudul = explode("-", $data[$i]['judul']);
        $judul = trim(str_replace(" ", "_", strtolower($xjudul[0])));
            print_r('<url>
                <loc>'.$url.'/'.$detail.'</loc>
                <priority>0.9</priority>
            </url>');
        } catch (Exception $e) {

        }

    }
$i++;
}

print_r('</urlset>');
