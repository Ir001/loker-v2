<?php 
	include '../include/config.php';
	
	$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
	$limit = $_POST['length']; // Ambil data limit per page
	$start = $_POST['start']; // Ambil data start
	$sql = mysqli_query($conn, "SELECT id_lowongan, judul, status, date_tutup FROM td_lowongan"); // Query untuk menghitung seluruh data loker
	$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql
	$query = "SELECT id_lowongan, judul, status, date_tutup FROM td_lowongan WHERE (judul LIKE '%".$search."%' OR status LIKE '%".$search."%' OR date_tutup LIKE '%".$search."%')";
	$order_field = $_POST['order'][0]['column']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
	$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
	$order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;
	$sql_data = mysqli_query($conn, $query.$order." LIMIT ".$limit." OFFSET ".$start); // Query untuk data yang akan di tampilkan
	$sql_filter = mysqli_query($conn, $query); // Query untuk count jumlah data sesuai dengan filter pada textbox pencarian
	$sql_filter_count = mysqli_num_rows($sql_filter); // Hitung data yg ada pada query $sql_filter
	$data = mysqli_fetch_all($sql_data, MYSQLI_ASSOC); // Untuk mengambil data hasil query menjadi array
	$callback = array(
	    'draw'=>$_POST['draw'], // Ini dari datatablenya
	    'recordsTotal'=>$sql_count,
	    'recordsFiltered'=>$sql_filter_count,
	    'data'=>$data
	);
	header('Content-Type: application/json');
	echo json_encode($callback); // Convert array $callback ke json

 ?>