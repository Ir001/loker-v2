<?php 

class search extends mysqli
{
	function __construct()
	{
		parent::__construct(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
		if (mysqli_connect_error()) {
			exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
		}
		parent::set_charset('utf-8');
	}
	function getSearch($keyword, $kategori, $lokasi){
			$batas = 5;
			$data = array();
			$halaman = @$_GET['page']?$_GET['page']:1;
            if ($halaman == 1) {
                $posisi = 0;
            } else {
                $posisi = ($halaman - 1) * $batas;
            }
				$sql = "SELECT * FROM td_lowongan WHERE 1=1";
				$qPage = "SELECT count(*) as total FROM td_lowongan WHERE 1=1";
				if($keyword != "") {
					$sql = " AND long_desc LIKE '%$keyword%'";
					$qPage = " AND long_desc LIKE '%$keyword%'";
				}
				if ($kategori != "") {
					$sql.= " AND kategori LIKE '%$kategori%'";
					$qPage.= " AND kategori LIKE '%$kategori%'";
				}
				if ($lokasi != "") {
					$qPage.= " AND kota LIKE '%$lokasi%'";
					$sql.= " AND kota LIKE '%$kategori%'";
				}
				$sql.=" AND status='active' LIMIT $posisi, $batas";
				$data_page = $this->query($qPage);
				$total_item = $data_page->fetch_assoc();
			$exec = $this->query($sql);
			$jumlah = $total_item['total'];
            $jmlhalaman = ceil($jumlah / $batas);
			if ($exec->num_rows == 0) {
				return 'nothing';
			}
			$data['jmldata'] = $jumlah;
			$data['jmlhalaman'] = $jmlhalaman;
			if ($result = $this->query($sql)) {        /* fetch associative array */
				$i = 0;
				while ($row = $result->fetch_assoc()) {
					$data[$i] = [
						'id_lowongan' => $row['id_lowongan'],
						'judul' => $row['judul'],
						'logo' => $row['logo'],
						'perusahaan' => $row['perusahaan'],
						'kota' => $row['kota'],
						'date_tutup' => $row['date_tutup'],
						'url' => $row['url'],
					];
					$i++;
				}
				$row = $result->fetch_assoc();
				$result->close();
			}

			

		return @$data;
	}
}
$search = new Search();
?>