<?php 
	include 'config.php';
	/**
	 * 
	 */
	class Admin extends mysqli
	{
		
		function __construct()
		{
			parent::__construct(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	        if (mysqli_connect_error()) {
	            exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
	        }
	        parent::set_charset('utf-8');
		}
		
		//Login page
		function setSession($data){
			$_SESSION['admin'] = $data;
			return true;
		}
		function getSession($param){
			if ($param == "") {
				return $_SESSION['admin'];
			}else{
				return $_SESSION[$param];
			}
		}
		function cekLogin(){
			if (isset($_SESSION['admin'])) {
				return 1;
			}else{
				return 0;
			}
		}
		function getLogin($email, $password){
			$msg = array(
				'success' => '',
				'msg' => ''
			);
			$email = $this->real_escape_string($email);
			$password = $this->real_escape_string(md5($password));
			//
			$sql = "SELECT * FROM admin WHERE email = '$email'";
			$exec = $this->query($sql);
			$row = $exec->num_rows;
			if ($row == 1) {
				$data = $exec->fetch_assoc();
				if ($data['password'] == $password) {
					$msg['success'] = 'yes';
					$msg['msg'] = 'Berhasil login!';
					$this->setSession($data);
				}else{
					$msg['success'] = 'no';
					$msg['msg'] = 'Kata sandi salah!';
				}
			}else{
				$msg['success'] = 'no';
				$msg['msg'] = 'Email tidak tersedia!';
			}
			return $msg;

		}
		function logout(){
			session_destroy();
			return 1;
		}

		//Admin page 
		function countLoker($status='all'){
			$sql = "SELECT count(*) as jumlah FROM td_lowongan";
			//
			if ($status == "active") {
				$sql.= " WHERE status = 'active'";
			}elseif($status == "expired"){
				$sql.= " WHERE status = 'expired'";
			}elseif($status == 'terbaru'){
				// $sql.= "WHERE date_tutup BEETWEN'";
			}
			$exec = $this->query($sql);
			$data = $exec->fetch_assoc();
			$jumlah = $data['jumlah'];
			return $jumlah;
		}

		function orderBy($order){
        $sql = "select distinct($order) as data from td_lowongan where 1=1 ";
        $sql .= "  order by $order asc  ";
        $hasil = $this->query($sql);
        if ($result = $this->query($sql)) {        /* fetch associative array */
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$i] = [$order => $row['data']];
                $i++;
            }
            $row = $result->fetch_assoc();
            $result->close();
            return $data;
        }

        
    }
    function jumlahData($field, $param){
			$sql = "SELECT count(*) as jumlah FROM td_lowongan WHERE $field = '$param'";
			$exec = $this->query($sql);
			$data = $exec->fetch_assoc();
			$jumlah = $data['jumlah'];
			return $jumlah;
    }

    // 

    function getArtikel($param = "all"){
    	$data = array();
    	if ($param == "all") {
    		$sql = "SELECT id_lowongan, judul, status, date_tutup FROM td_lowongan ORDER BY date_tutup DESC";
    	}elseif ($param == "active") {
    		$sql = "SELECT id_lowongan, judul, status, date_tutup FROM td_lowongan WHERE status = 'active'";

    	}elseif ($param == "expired") {
    		$sql = "SELECT id_lowongan, judul, status, date_tutup FROM td_lowongan WHERE status = 'expired'";
    	}
    	if ($exec = $this->query($sql)) {
	    	$i = 0;
	    	while ($result = $exec->fetch_assoc()) {
	    		$data[$i] = [
	    			'id_lowongan' => $result['id_lowongan'],
	    			'judul' => $result['judul'],
	    			'status' => $result['status'],
	    			'date_tutup' => $result['date_tutup'],
	    		];
	    		$i++;
	    	}
	    	$result = $exec->fetch_assoc();
	    	$exec->close();
    	}
    	return @$data;
    }
    //
    function showAds(){
    	$sql = "SELECT * FROM ads";
    	if ($exec = $this->query($sql)) {
    		$i=0;
    		while ($row = $exec->fetch_assoc()) {
    			$data[$i] = [
    				'ads_id' => $row['ads_id'],
    				'name' => $row['name'],
    				'source_code' => $row['source_code'],
    				'description' => $row['description'],
    				'show_in' => $row['show_in']
    			];
    			$i++;
    		}
    		$row = $exec->fetch_assoc();
	    	$exec->close();
    		return @$data;
    	}
    }
    function editAds($id, $code){
    	$sql = "UPDATE ads SET source_code = '$code' WHERE ads_id=$id";
    	$exec = $this->query($sql);
    	return 1;

    }
    function getSetting(){
    	$sql = "SELECT * FROM settings WHERE 1=1";
    	$exec = $this->query($sql);
    	$data = $exec->fetch_assoc();
    	return @$data;
    }
    // 
    function updateSetting($title, $tag_line, $description, $keywords, $tag_manager, $adsense, $kd_location){
    	$title = $this->real_escape_string($title);
    	$tag_line = $this->real_escape_string($tag_line);
    	$description = $this->real_escape_string($description);
    	$keywords = $this->real_escape_string($keywords);
    	$tag_manager = $this->real_escape_string($tag_manager);
        $adsense = $this->real_escape_string($adsense);
    	$kd_location = $this->real_escape_string($kd_location);
    	$sql = "UPDATE settings SET title = '$title', tag_line = '$tag_line', description = '$description', keywords = '$keywords', tag_manager = '$tag_manager', adsense = '$adsense', kd_location = '$kd_location'";
    	if ($exec = $this->query($sql)) {
    		return 1;
    	}else{
    		return 0;
    	}
    }
    // Add Iklan
    function addAds($name, $sc, $desc, $show){
    	// 
    	$check = "SELECT show_in FROM ads WHERE show_in='$show'";
    	$res = $this->query($check);
    	$row = $res->num_rows;
    	if($row == 0){
    		$sql = "INSERT INTO ads (name, source_code, description, show_in) VALUES ('$name', '$sc', '$desc', '$show')";
	    	if ($exec = $this->query($sql)) {
	    		$data['status'] = 'success';
    			$data['response'] = "Berhasil menambahkan iklan";
	    	}else{
	    		$data['status'] = 'failed';
    			$data['response'] = "Terjadi kesalahan saat menambahkan iklan";
	    	}
    	}else{
    		$data['status'] = 'failed';
    		$data['response'] = "Iklan yang tayang pada halaman {$show} sudah ada. Jika Anda ingin mengubah silahkan edit pada bagian edit iklan";

    	}
    	return @$data;
    	

    }


    // 
    function deleteArtikel($id){
    	$id = trim($id);
    	$sql = "DELETE FROM td_lowongan WHERE id_lowongan = $id";
    	if ($exec = $this->query($sql)) {
    		return 1;
    	}else{
    		return 0;
    	}
    }
    function updateDate(){
    	include '../application/convertDate.php';
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
    function grabing($location)
    {
        $url = "http://www.jobstreet.co.id/id/job-search/job-vacancy.php?key=&location=$location&specialization=&area=&salary=&ojs=3&src=12";
        include '../application/simple_html_dom.php';
        include '../application/filterKota.php';
        include '../application/convertDate.php';
        $html = file_get_html($url);
        $panel = $html->find('div[class=panel-body]');
        $jmlData = count($html->find('div[class=panel-body]'));
        $tot = 10;
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
            $ditutup = $htmlDetil->find('#closing_date', 0)->plaintext;
            $date_buka = convertDate("$dibuka"); 
            $date_tutup = convertDate("$ditutup"); 
            $sqlCekJudul = "select judul from td_lowongan where judul = '$judul-$perusahaan'";
            $hasil = $this->query($sqlCekJudul);
            $row = $hasil->fetch_assoc();
            if ($row['judul'] == '') {
                $sql = "insert into td_lowongan (judul,long_desc,short_desc,gambaran_pers,tentang_pers,mengapa,logo,kategori,kategori_parent,industri,lokasi,          perusahaan,dibuka,ditutup,url,alamat,permalink, kota, date_buka, date_tutup) values('$judul-$perusahaan', '" . $this->real_escape_string($fullDesc) . "', '" . $this->real_escape_string($shortDesc) . "', '" . $this->real_escape_string($gambaran) . "', '" . $this->real_escape_string($tentang) . "', '" . $this->real_escape_string($why) . "', '" . $this->real_escape_string($logo) . "',  '$kategori','$parent','$industri','$lokasi','$perusahaan','$dibuka','$ditutup','$url','$alamat','$permalink', '$kota', '$date_buka', '$date_tutup')";
                $this->query($sql);
            }
        }
    }
    function get_kode_location(){
        $sql = "SELECT name, kode FROM kd_location WHERE 1=1";
            $hasil = $this->query($sql);
            if ($result = $this->query($sql)) {        /* fetch associative array */
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $data[$i] = [
                        'name' => $row['name'],
                        'kode' => $row['kode']
                    ];
                    $i++;
                }
                $row = $result->fetch_assoc();
                $result->close();
                return $data;
            }
    }


	}


    //

    


	$su = new admin();
  	$loged = $su->cekLogin();

 ?>