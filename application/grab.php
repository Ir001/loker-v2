<?php 
include('config.php');
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

    function insert($url, $aksi)
    {
        $url = $url;
        $aksi = $aksi;
        include('simple_html_dom.php');
        include('filterKota.php');
        include('convertDate.php');
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
            $judul = $html->find("#position_title_$i", 0)->plaintext;
            $permalink = str_replace(' ', '-', $judul);
            $url = $html->find("#position_title_$i", 0)->href;
            $perusahaan = $html->find("#company_name_$i", 0)->plaintext;
            $lokasi = $html->find("#job_location_$i", 0)->plaintext;
            $kota = filterKota($lokasi);
            $shortDesc = $html->find("#job_desc_detail_$i", 0);
            $logo = str_replace('data-original', 'src', $html->find("#img_company_logo_$i", 0));
            $kategori = $html->find("#job_specialization_desc", 0)->plaintext;
            $parent = str_replace('>', '', $html->find("#job_role_desc", 0)->plaintext);
            $industri = $html->find("#job_industry_desc", 0)->plaintext;
            $htmlDetil = file_get_html($url);
            $fullDesc = $htmlDetil->find('#job_description', 0);
            $cekAddress = explode('address', $htmlDetil);
            if (count($cekAddress) > 1) {
                $alamat = $htmlDetil->find('#address', 0)->plaintext;
            } else {
                $alamat = '';
            }
            $gambaran = $htmlDetil->find('.panel-clean', 0);
            $foto = $htmlDetil->find('#main-img', 0);
            $tentang = $htmlDetil->find('#company_overview_all', 0);
            $why = $htmlDetil->find('#why_join_us', 0);
            $dibuka = $htmlDetil->find('#posting_date', 0)->plaintext;
            $date_buka = convertDate($dibuka);
            $ditutup = $htmlDetil->find('#closing_date', 0)->plaintext;
            $date_tuka = convertDate($ditutup);
            $sqlCekJudul = "select judul from td_lowongan where judul = '$judul-$perusahaan'";
            $hasil = $this->query($sqlCekJudul);
            $row = $hasil->fetch_assoc();
            if ($row['judul'] == '') {
                $sql = "insert into td_lowongan           (judul,long_desc,short_desc,gambaran_pers,tentang_pers,mengapa,logo,kategori,kategori_parent,industri,lokasi,          perusahaan,dibuka,ditutup,url,alamat,permalink, kota, date_buka, date_tuka)          values('$judul-$perusahaan',          '" . $this->real_escape_string($fullDesc) . "',          '" . $this->real_escape_string($shortDesc) . "',          '" . $this->real_escape_string($gambaran) . "',          '" . $this->real_escape_string($tentang) . "',          '" . $this->real_escape_string($why) . "',          '" . $this->real_escape_string($logo) . "',          '$kategori','$parent','$industri','$lokasi','$perusahaan','$dibuka','$ditutup','$url','$alamat','$permalink', '$kota', '$date_buka', '$date_tuka')";
                $sql = "insert into td_lowongan (judul,long_desc,short_desc,gambaran_pers,tentang_pers,mengapa,logo,kategori,kategori_parent,industri,lokasi,          perusahaan,dibuka,ditutup,url,alamat,permalink, kota, date_buka, date_tutup)          values('$judul-$perusahaan',          '" . $this->real_escape_string($fullDesc) . "',          '" . $this->real_escape_string($shortDesc) . "',          '" . $this->real_escape_string($gambaran) . "',          '" . $this->real_escape_string($tentang) . "',          '" . $this->real_escape_string($why) . "',          '" . $this->real_escape_string($logo) . "',          '$kategori','$parent','$industri','$lokasi','$perusahaan','$dibuka','$ditutup','$url','$alamat','$permalink', '$kota', '$date_buka', '$date_tuka')";
                $this->query($sql);
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
        $sql = "select * from td_lowongan ";
        $batas = 10;
        if ($param == 'sitemap') {
            $sql .= " where 1=1";
            $paging2 = "select count(id_lowongan) jmldata from td_lowongan";
        }else {
            $sql .= " where 1=1";
            $paging2 = "select count(id_lowongan) jmldata from td_lowongan";
            
        }
            $jmldata = $this->query($paging2);
            $jmldata2 = $jmldata->fetch_assoc();
            $jmldataint = $jmldata2['jmldata'];
            $jmlhalaman = ceil($jmldataint / $batas);
            $halaman = @$_GET['page']?$_GET['page']:1;
            if ($halaman == 1) {
                $posisi = 0;
            } else {
                $posisi = ($halaman - 1) * $batas;
            }
            $sql .= " order by id_lowongan desc ";
            if ($param == 'sitemap') {
                
            }else{
                $sql .= " limit $posisi,$batas ";
            }
            
            $data['jmldata'] = $jmldataint;
            $data['jmlhalaman'] = $jmlhalaman;
            if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = ['judul' => $row['judul'], 'long_desc' => $row['long_desc'], 'short_desc' => $row['short_desc'], 'kategori' => $row['kategori'], 'lokasi' => $row['lokasi'], 'logo' => $row['logo'], 'perusahaan' => $row['perusahaan'], 'ditutup' => $row['ditutup'], 'dibuka' => $row['dibuka'], 'id_lowongan' => $row['id_lowongan'], 'alamat' => $row['alamat'], 'permalink' => $row['permalink'], 'kota' => $row['kota'],'date_tutup' => $row['date_tutup']];
                $i++;
            }
            $row = $result->fetch_assoc();
            $result->close();
            

        }
        return @$data;
    }

    private function findField()
    {
        $findField = ["judul", "long_desc", "gambaran_pers", "tentang_pers", "mengapa", "kategori", "lokasi", "perusahaan", "dibuka", "ditutup", "industri"];
        return $findField;
    }

    private function buildSqlSearchingCriteria($keywords, $findField)
    {
        $arrayKata = explode(' ', $keywords);
        foreach ($arrayKata as $hasil) {
            if ($hasil != 'lowongan') {
                foreach ($findField as $fieldName) {
                    $criteria[] = "LOWER($fieldName) like '%$hasil%'";
                }
                $queryCriteria[] = implode(" OR ", $criteria);
            }
        }
        $resultCriteria = implode(" OR ", $queryCriteria);
        return $resultCriteria;
    }
    function cariArtikel($key, $kat, $lok)
    {
        $key = $key;
        $keyPlus = str_replace(' ', '+', $key);
        $lok = $lok;
        $kat = $kat;
        if ($lok == "all") {
            $lok = "";
        }elseif ($kat == "all") {
            $kat = "";
        }
        $sql = "select * from td_lowongan where 1=1 ";
        if ($key != '') {
            $keywords = strtolower($key);
            $findField = $this->findField();
            $criteria = $this->buildSqlSearchingCriteria($keywords, $findField);
            $sql .= " and ($criteria) ";
        }
        if ($kat != '') {
            $sql .= " and kategori like '%$kat%' ";
        }
        if ($lok != '') {
            $sql .= " and lokasi like '%$lok%' ";
        }
        $sql .= " order by id_lowongan asc limit 10";
        $hasil = $this->query($sql);
        if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = ['judul' => $row['judul'], 'long_desc' => $row['long_desc'], 'short_desc' => $row['short_desc'], 'kategori' => $row['kategori'], 'lokasi' => $row['lokasi'], 'logo' => $row['logo'], 'perusahaan' => $row['perusahaan'], 'ditutup' => $row['ditutup'], 'dibuka' => $row['dibuka'], 'id_lowongan' => $row['id_lowongan'], 'alamat' => $row['alamat'], 'permalink' => $row['permalink'], 'kota' => $row['kota'],'date_tutup' => $row['date_tutup']];
                $i++;
            }
            if ($result->num_rows == 0) {
              return "nothing";
            }
            return @$data;
        }else {
              return "nothing";
        }
            $row = $result->fetch_assoc();
            $result->close();
        }

    function showDetail($judul, $id)
    {
        $sql = "select * from td_lowongan where 1=1 and id_lowongan='$id'";
        $sql .= " order by id_lowongan desc ";
        $hasil = $this->query($sql);
        if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = ['judul' => $row['judul'], 'long_desc' => $row['long_desc'], 'short_desc' => $row['short_desc'], 'kategori' => $row['kategori'], 'lokasi' => $row['lokasi'], 'logo' => $row['logo'], 'perusahaan' => $row['perusahaan'], 'ditutup' => $row['ditutup'], 'dibuka' => $row['dibuka'], 'alamat' => $row['alamat'], 'url' => $row['url'], 'id_lowongan' => $row['id_lowongan'], 'gambaran_pers' => $row['gambaran_pers'], 'tentang_pers' => $row['tentang_pers'], 'permalink' => $row['permalink'], 'mengapa' => $row['mengapa']];
                $i++;
            }
            $row = $result->fetch_assoc();
            $result->close();
            return $data;
        }
    }

    function showKategori()
    {
        $sql = "select distinct(kategori) from td_lowongan where 1=1 ";
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
        $sql = "SELECT count(id_lowongan) FROM td_lowongan WHERE kategori ='$kategori'";
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

    function showParent()
    {
        $sql = "select distinct(kategori_parent) from td_lowongan order by id_lowongan desc ";
        $hasil = $this->query($sql);
        if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = ['kategori_parent' => $row['kategori_parent']];
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

    function getLokasi()
    {
        $sql = "select distinct(lokasi) from td_lowongan where 1=1 ";
        $sql .= "  order by lokasi asc  ";
        $hasil = $this->query($sql);
        if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = ['lokasi' => $row['lokasi']];
                $i++;
            }
            $row = $result->fetch_assoc();
            $result->close();
            return $data;
        }
    }

    function getAds()
    {
        $sql = "select * from ads_setting";
        if ($result = $this->query($sql)) {              /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = ['main_atas' => $row['main_atas'], 'main_bawah' => $row['main_bawah'], 'sidebar_kanan' => $row['sidebar_kanan'], 'sidebar_tengah' => $row['sidebar_tengah']];
                $i++;
            }
            $result->close();
            return $data;
        }
    }

    function getDataSetting()
    {
        $sql = "select * from setting";
        if ($result = $this->query($sql)) {              /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = ['title' => $row['title'], 'tag_line' => $row['tag_line'], 'keywords' => $row['keywords'], 'analytics' => $row['analytics'], 'statistik' => $row['statistik'], 'fb_page' => $row['fb_page'], 'durasi' => $row['durasi']];
                $i++;
            }
            $result->close();
            return $data;
        }
    }
}

if (isset($_POST['url'])) {
    $url = $_POST['url'];
} else {
    $url = 'oke';
}
$myApp = new grabbing();
if (isset($_POST['aksi'])) {
    $aksi = $_POST['aksi'];
    if ($aksi == 'cari') {
        $lok = $_POST['lokasi'];
        $kat = $_POST['kategori'];
        $key = str_replace(' ', '+', $_POST['keyword']);
        $url = "http://www.jobstreet.co.id/id/job-search/job-vacancy.php?key=$key&location=$lok&specialization=$kat&area=&salary=&ojs=3&src=1";
        $myApp->insert($url, $aksi);
    }else {
        $url = 'http://www.jobstreet.co.id/id/job-search/job-vacancy.php';
        $myApp->insert($url, $aksi);
    }
}else{
    $url = 'http://www.jobstreet.co.id/id/job-search/job-vacancy.php';
   // $myApp->insert($url, "cari");

} 

?>