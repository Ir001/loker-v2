<?php include('config.php');

class grabbing extends mysqli
{
    function __construct()
    {
        parent::__construct(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
        parent::set_charset('utf-8');
    }

    function insert($url, $aksi="cari")
    {
        $url = $url;
        $aksi = $aksi;
        include_once 'simple_html_dom.php';
        include_once 'filterKota.php';
        include_once 'convertDate.php';
        $html = file_get_html($url);
        $panel = $html->find('div[class=panel-body]');
        $jmlData = count($html->find('div[class=panel-body]'));
        if ($aksi == 'cari') {
            if ($jmlData > 5) {
                $tot = 5;
            } else {
                $tot = $jmlData;
            }
        } else {
            $tot = 10;
        }
        for ($i = 1; $i < $tot; $i++) {
            $judul = $this->real_escape_string($html->find("#position_title_$i", 0)->plaintext);
            $permalink = $this->real_escape_string(str_replace(' ', '-', $judul));
            $url = $this->real_escape_string($html->find("#position_title_$i", 0)->href);
            $perusahaan = $this->real_escape_string($html->find("#company_name_$i", 0)->plaintext);
            $lokasi = $this->real_escape_string($html->find("#job_location_$i", 0)->plaintext);
            $kota = $this->real_escape_string(filterKota($lokasi));
            $logo = $this->real_escape_string(str_replace('data-original', 'src', $html->find("#img_company_logo_$i", 0)));
            $kategori = $this->real_escape_string($html->find("#job_specialization_desc", 0)->plaintext);
            $industri = $this->real_escape_string($html->find("#job_industry_desc", 0)->plaintext);
            $htmlDetil = file_get_html($url);
            $fullDesc = $this->real_escape_string($htmlDetil->find('#job_description', 0));
            $cekAddress = explode('address', $htmlDetil);
            if (count($cekAddress) > 1) {
                $alamat = $this->real_escape_string($htmlDetil->find('#address', 0)->plaintext);
            } else {
                $alamat = '';
            }
            $gambaran = $htmlDetil->find('.panel-clean', 0); /*Gambaran Perusaahaan*/
            $tentang = $htmlDetil->find('#company_overview_all', 0); /*Tentang Pers*/
            $why = $htmlDetil->find('#why_join_us', 0); /*Mengapa Bergabung*/
            $dibuka = $htmlDetil->find('#posting_date', 0)->plaintext;
            $dibuka = $htmlDetil->find('#posting_date', 0)->plaintext;
            $ditutup = $htmlDetil->find('#closing_date', 0)->plaintext;
            $date_buka = convertDate("$dibuka"); 
            $date_tutup = convertDate("$ditutup"); 
            $sqlCekJudul = "select judul from td_lowongan where judul = '$judul - $perusahaan'";
            $hasil = $this->query($sqlCekJudul);
            $row = $hasil->fetch_assoc();
            if ($row['judul'] == '') {
                $sql = "INSERT INTO td_lowongan (judul, long_desc, gambaran_pers, tentang_pers, mengapa, logo, kategori, industri, lokasi, kota, perusahaan, alamat, url, permalink, date_buka, date_tutup) VALUES ('$judul - $perusahaan', '$fullDesc', '$gambaran', '$tentang', '$why', '$logo', '$kategori', '$industri
                ', '$lokasi', '$kota', '$perusahaan', '$alamat', '$url', '$permalink', '$date_buka', '$date_tutup')";
                
                $this->query($sql);
            }else{
                $tot+1;
            }
            if ($aksi == 'cari' && $i == 6) {          /* keyword:marketing mobil          page:cari          kategori:          kategori_text:          lokasi:          wilayah_text:          aksi:cari */
                exit();
            }
        }
    }

    function showArtikel($param, $page)
    {
        $param = $param;
        $page = $page;
        $data=array();
        if ($param != 'sitemap') {
            $sql = "SELECT * FROM td_lowongan";
        }else{
            $sql = "SELECT id_lowongan, judul FROM td_lowongan";
        }
        $batas = 10;
        if ($param == 'sitemap') {
            $sql .= " where 1=1";
            $paging2 = "select count(id_lowongan) jmldata from td_lowongan";
        }elseif ($page == "industri" || $page == "kategori" || $page == "kota") {
            $sql .= " where $page = '$param' AND status='active' ";
            $paging2 = "select count(id_lowongan) jmldata from td_lowongan where $page = '$param' AND status='active'";
        }else{
            $sql .= " WHERE status='active'";
            $paging2 = "select count(id_lowongan) jmldata from td_lowongan where status='active'";
            
        }
            $jmldata = $this->query($paging2);
            $jmldata2 = $jmldata->fetch_assoc();
            $jmldataint = $jmldata2['jmldata'];
            $jmlhalaman = ceil($jmldataint / $batas);
            $halaman = @$_GET['page']?$_GET['page']: 1;
            if ($halaman == 1) {
                $posisi = 0;
            } else {
                $posisi = ($halaman-1)*$batas;
            }
            $sql .= " order by id_lowongan desc ";
            if ($param == 'sitemap') {
                $sql .= " limit 0,49999 ";
            }else{
                $sql .= " limit $posisi,$batas ";
            }
            
            $data['jmldata'] = $jmldataint;
            $data['jmlhalaman'] = $jmlhalaman;

//        print_r($sql);exit();
        if ($param == 'sitemap') {
            if ($result = $this->query($sql)) {        /* fetch associative array */
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $data[$i] = [
                        'id_lowongan' => $row['id_lowongan'],
                        'judul' => $row['judul'],
                    ];
                    $i++;
                }
                $row = $result->fetch_assoc();
                $result->close();
                

            }
        }else{
            if ($result = $this->query($sql)) {        /* fetch associative array */
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $data[$i] = $row;
                    $i++;
                }
                $row = $result->fetch_assoc();
                $result->close();
                

            }

        }
        
        return @$data;
    }

/*
    Function anti SQL Injection
*/
  function anti_inject($string){
    $string = @trim($string);
    $string = htmlspecialchars($string);
    $string = $this->real_escape_string($string);
    return @$string;
  }

  function showDetail($judul, $id) 
    {
        $id = $this->anti_inject($id);
        $sql = "select * from td_lowongan where 1=1 and id_lowongan='$id'";
        $sql .= " order by id_lowongan desc ";
        $hasil = $this->query($sql);
        if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = $row;
                $i++;
            }
            $row = $result->fetch_assoc();
            $result->close();
            return $data;
        }
    }

    function showKategori($param="all")
    {
        if ($param=="all") {
            $sql = "select distinct(kategori) from td_lowongan where 1=1 AND status='active'";
            $sql .= "  order by kategori asc  ";
            $hasil = $this->query($sql);
            if ($result = $this->query($sql)) {        /* fetch associative array */
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $data[$i] = ['kategori' => $row['kategori']];
                    $i++;
                }
                $row = $result->fetch_assoc();
                $result->close();
                return $data;
            }
        }else{
            $sql = "select distinct(kategori) from td_lowongan where 1=1 AND status='active'";
            $sql .= "  order by kategori asc LIMIT 0, $param";
            $hasil = $this->query($sql);
            if ($result = $this->query($sql)) {        /* fetch associative array */
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $data[$i] = ['kategori' => $row['kategori']];
                    $i++;
                }
                $row = $result->fetch_assoc();
                $result->close();
                return $data;
            }
        }
       
    }
     function thumbKat()
    {
        $sql = "select distinct(kategori) from td_lowongan LIMIT 0,8";
        $hasil = $this->query($sql);
        if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = [
                    'kategori' => $row['kategori']
                ];
                $i++;
            }
            $row = $result->fetch_assoc();
            $result->close();
            return $data;
        }
    }
    function countKat($kategori){
        $sql = "SELECT count(id_lowongan) FROM td_lowongan WHERE kategori ='$kategori' AND status='active'";
        $exec = $this->query($sql);
        $result = $exec->fetch_assoc();
        return $result['count(id_lowongan)'];
    }
    function showKota()
    {
        $sql = "select distinct(kota) from td_lowongan where 1=1 ";
        $sql .= "  order by kota asc  ";
        $hasil = $this->query($sql);
        if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = ['kota' => $row['kota']];
                $i++;
            }
            $row = $result->fetch_assoc();
            $result->close();
            return $data;
        }
    }

   

    function getIndustri()
    {
        $sql = "select distinct(industri) from td_lowongan order by industri asc ";
        $hasil = $this->query($sql);
        if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = ['industri' => $row['industri']];
                $i++;
            }
            $row = $result->fetch_assoc();
            $result->close();
            return $data;
        }
    }

    function getLokasi($param="all")
    {
        if ($param=="all") {
            $sql = "select distinct(kota) from td_lowongan where 1=1 ";
            $sql .= "  order by kota asc  ";
            $hasil = $this->query($sql);
            if ($result = $this->query($sql)) {        /* fetch associative array */
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $data[$i] = ['lokasi' => $row['kota']];
                    $i++;
                }
                $row = $result->fetch_assoc();
                $result->close();
                return $data;
            }
        }else{
            $sql = "select distinct(kota) from td_lowongan where 1=1 ";
            $sql .= "  order by kota asc LIMIT 0, $param";
            $hasil = $this->query($sql);
            if ($result = $this->query($sql)) {        /* fetch associative array */
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $data[$i] = ['lokasi' => $row['kota']];
                    $i++;
                }
                $row = $result->fetch_assoc();
                $result->close();
                return $data;
            }
        }
        
    }

    function getAds($param="front")
    {       
        $sql = "select * from ads WHERE show_in = '$param'";
        if ($result = $this->query($sql)) {              /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = [
                    'source_code' => $row['source_code'],
                    'show_in' => $row['show_in'],
                ];
                $i++;
            }
            $result->close();
            return @$data;
        }
    }
    function getSetting(){
        $sql = "SELECT * FROM settings";
        if ($result = $this->query($sql)) {              /* fetch associative array */
            $data = $result->fetch_assoc();
            return $data;
        }else{
            return null;
        }

    }
    function updateDate(){
        $sql  = "SELECT id_lowongan,dibuka, ditutup FROM td_lowongan ORDER BY id_lowongan DESC";
        $exec = $this->query($sql);
        while ($result = $exec->fetch_assoc()) {
            $id_lowongan = $result['id_lowongan'];
            $dibuka = convertDate($result['dibuka']);
            $ditutup = convertDate($result['ditutup']);
            // 
            $update = "UPDATE td_lowongan SET date_buka = '$dibuka', date_tutup = '$ditutup' WHERE id_lowongan = $id_lowongan";
            $query = $this->query($update);

        }
        return 1;
    }
    function checkExpired(){
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $sql  = "SELECT id_lowongan, date_tutup FROM td_lowongan WHERE 1=1";
        $exec = $this->query($sql);
        $i = 0;
        while ($result = $exec->fetch_assoc()) {
            $deadline = $result['date_tutup'];
            $id_lowongan = $result['id_lowongan'];
            if($deadline < $now){
                $status = 'expired';
            }else{
                $status = 'active';
            }
            $sql = "UPDATE td_lowongan SET status = '$status' WHERE id_lowongan = $id_lowongan";
            $this->query($sql);
            $i++;   
        }
        return 1;
    }
    function getContent($url){
        $url = strtolower($url);
        $sql = "SELECT * FROM page WHERE type = '$url'";
        $query = $this->query($sql);
        $result = $query->fetch_assoc();
        return @$result;
    }
    
}

if (isset($_POST['url'])) {
    $url = $_POST['url'];
} else {
    $url = 'http://www.jobstreet.co.id/id/job-search/job-vacancy.php';
}
$myApp = new grabbing();
$set = $myApp->getSetting();
$ads = $myApp->getAds();
if ($set['auto_grab'] == "on") {
    if (isset($_POST['aksi'])) {
        $aksi = $_POST['aksi'];
        if ($aksi == 'cari') {
            $lok = $_POST['lokasi'];
            $kat = $_POST['kategori'];
            $key = str_replace(' ', '+', $_POST['keyword']);
            $url = "http://www.jobstreet.co.id/id/job-search/job-vacancy.php?key=$key&location=$lok&specialization=$kat&area=&salary=&ojs=3&src=1";
            $myApp->insert($url, $aksi);
        } else {
            $kd_location = $set['kd_location'];
            $url = 'http://www.jobstreet.co.id/id/job-search/job-vacancy.php?key=&location='.$kd_location.'&specialization=&area=&salary=&ojs=3&src=1';
            $myApp->insert($url, $aksi);
        }
    }
}
?>