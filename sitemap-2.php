<?php
include 'application/grab-v2.php';
header('Content-type: application/xml; charset="ISO-8859-1"', true);

/**
 * Created by PhpStorm.
 * User: cat mating
 * Date: 10/11/2016
 * Time: 20.12
 */
// $url = "https://" . $_SERVER['HTTP_HOST'];
$url = $set['base_url'];
print_r('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">');
print_r('<url>
            <loc>' . $url . '</loc>
            <priority>1.0</priority>
        </url>');

$param = 'sitemap';
$page  = 1;
$data = $myApp->sitemap(2);
$i = 0;
foreach ($data as $val) {
    // print_r($data);
    if(isset($data[$i])){
        try {
            $id_loker = $data[$i]['id_lowongan'];
            $judul = explode("-", $data[$i]['judul']);
            $low_judul = strtolower($judul[0]);
            $exp_judul = explode("/", $low_judul);
            $title = str_replace(" ", "-", $exp_judul[0]);
            $title = trim($title, "-");
            // 
            $detail = $set['base_url']."detail/".$id_loker."/".$title;
            if ($data['row'] != 0) {
                print_r('<url>
                    <loc>'.$detail.'</loc>
                    <priority>0.9</priority>
                </url>');
            }
                
        } catch (Exception $e) {

        }

    }
$i++;
}

print_r('</urlset>');
