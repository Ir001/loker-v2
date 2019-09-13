<?php
//setting database koneksi
define('DB_HOST', 'localhost'); //nama host
define('DB_NAME', 'loker'); //lastdirv_lokerja
define('DB_USER', 'root'); //nlastdirv_lokerja
define('DB_PASSWD', 'root'); //lokerja000
// define('url', 'https://job-fix.ant'); //lokerja000
$conn  = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

function base_url(){
	$url = "http://localhost/job-fix";
	echo $url;
}