<?php 
	if (isset($_GET)) {
		$batas = 10;
		$data = array();
		if (isset($_GET['keyword']) && isset($_GET['wilayah'])){
			$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
			$kota = mysqli_real_escape_string($conn, $_GET['wilayah']);
			//
			$page = $conn->query("SELECT count(id_lowongan) FROM td_lowongan WHERE judul LIKE '%$keyword%'");
			$jml = $page->fetch_assoc();
			$jumlahint = $jml['count(id_lowongan)'];
			$jmlhalaman = ceil($jumlahint / $batas);
	        $halaman = @$_GET['hal']?$_GET['hal']:1;
	        if ($halaman == 1) {
	            $posisi = 0;
	        } else {
	            $posisi = ($halaman - 1) * $batas;
	        }
			$query = "SELECT * FROM td_lowongan WHERE judul LIKE '%$keyword%'";
			$query.= "AND kota = '$kota'";
	        $query .= " limit $posisi,$batas ";
			// $query .= " order by id_lowongan desc";
			$sql = $conn->query($query);
			$jumlah = $sql->num_rows;
			if ($jumlah == 0) {
				$content = 'Data tidak ditemukan';
			}
			if ($result = $conn->query($query)) {        /* fetch associative array */
	            $i = 0;
	            while ($row = $result->fetch_assoc()) {
	                $data[$i] = ['judul' => $row['judul'], 'long_desc' => $row['long_desc'], 'short_desc' => $row['short_desc'], 'kategori' => $row['kategori'], 'lokasi' => $row['lokasi'], 'logo' => $row['logo'], 'perusahaan' => $row['perusahaan'], 'ditutup' => $row['ditutup'], 'dibuka' => $row['dibuka'], 'id_lowongan' => $row['id_lowongan'], 'alamat' => $row['alamat'], 'permalink' => $row['permalink'], 'kota' => $row['kota'],];
	                $i++;
	            }
	            $row = $result->fetch_assoc();
	            $result->close();
	        }
			$data['jmldata'] = $jumlahint;
	        $data['jmlhalaman'] = $jmlhalaman;
		}elseif(isset($_GET['keyword'])){
			$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
			//
			$page = $conn->query("SELECT count(id_lowongan) FROM td_lowongan WHERE judul LIKE '%$keyword%'");
			$jml = $page->fetch_assoc();
			$jumlahint = $jml['count(id_lowongan)'];
			$jmlhalaman = ceil($jumlahint / $batas);
	        $halaman = @$_GET['hal']?$_GET['hal']:1;
	        if ($halaman == 1) {
	            $posisi = 0;
	        } else {
	            $posisi = ($halaman - 1) * $batas;
	        }
			$query = "SELECT * FROM td_lowongan WHERE judul LIKE '%$keyword%'";
	        $query .= " limit $posisi,$batas ";
			// $query .= " order by id_lowongan desc";
			$sql = $conn->query($query);
			$jumlah = $sql->num_rows;
			if ($jumlah == 0) {
				$content = 'Data tidak ditemukan';
			}
			if ($result = $conn->query($query)) {        /* fetch associative array */
	            $i = 0;
	            while ($row = $result->fetch_assoc()) {
	                $data[$i] = ['judul' => $row['judul'], 'long_desc' => $row['long_desc'], 'short_desc' => $row['short_desc'], 'kategori' => $row['kategori'], 'lokasi' => $row['lokasi'], 'logo' => $row['logo'], 'perusahaan' => $row['perusahaan'], 'ditutup' => $row['ditutup'], 'dibuka' => $row['dibuka'], 'id_lowongan' => $row['id_lowongan'], 'alamat' => $row['alamat'], 'permalink' => $row['permalink'], 'kota' => $row['kota'],];
	                $i++;
	            }
	            $row = $result->fetch_assoc();
	            $result->close();
	        }
			$data['jmldata'] = $jumlahint;
	        $data['jmlhalaman'] = $jmlhalaman;
		}
		return @$data;
	}
 ?>