<?php
//setting database koneksi
define('DB_HOST', 'localhost'); //nama host
define('DB_NAME', 'lastdirv_lokerja'); //lastdirv_lokerja
define('DB_USER', 'lastdirv_lokerja'); //lastdirv_lokerja
define('DB_PASSWD', 'lokerja000'); //lokerja000
// define('url', 'https://job-fix.ant'); //lokerja000
$conn  = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

?>