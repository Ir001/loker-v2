<?php 
$judul = $_GET['post'];
$id = $_GET['id'];
$post = $_GET['post'];
$data = $myApp->showDetail($post, $id);
$a = explode("-", $data[0]['judul']);
$title = $a[0];
$url_title = trim(str_replace(" ", "+", strtolower($title)));
$url = $data[0]['id_lowongan']."_lowongan_".$url_title.".html";

// 

 ?>
<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="author" content="John Doe">
	<meta name="description" content="">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Loker.id - <?php echo $data[0]['judul']; ?></title>

<?php include 'template/meta_head.php'; ?>
<style type="text/css">
	div, p, ul li{
		font-family: proxima nova;
	}
	li{
		line-height: 29px;
	}
</style>
</head>
<body class="background-color-white-drak ">
<?php include 'template/navbar.php'; ?>
<section id="job-Details" style="margin-top: 120px !important">

						<div class="container background-color-full-white job-Details">
							<div class="Exclusive-Product">
								<h3><?php echo $data[0]['judul']; ?></h3>
								<?php 
									$uri = explode('?fr', $data[0]['url']);
								    $url2 = explode('-', $uri[0]);
								    $jmlData = count($url2);
								    $idJob = $url2[$jmlData-1];
							     ?>
							     <!-- action="https://myjobstreet-id.jobstreet.co.id/application/online-apply.php" -->
						      <form id="job-form"  id="apply-now-link">
						        <input type="hidden" value="<?php echo "$idJob"; ?>" name="job_id" id="job_id">
						        <input type="hidden" value="40" name="s" id="s">
						        <input type="hidden" value="1" name="AdvertisementSource" id="AdvertisementSource">
						        <input type="hidden" name="fr" id="fr" value="">
						        <button id="apply_button" type="submit" class="Apply-Now">Lamar Sekarang</button>
						      </form>
								<h6 class="font-color-orange"><?php echo $data[0]['perusahaan'] ?></h6>
								<a href="job.php?kategori=<?php echo strtolower($data[0]['kategori']); ?>">View more similar jobs</a>
								<i class="material-icons">place</i>
								<span class="text"><?php echo $data[0]['alamat'] ?></span>
								<div class="my-5">
									<?php echo $data[0]['logo']; ?>
								</div>
								<h4>Job description</h4>
								<p>Sebelum Anda melamar lowongan <?php echo $data[0]['judul']; ?> ini atau menekan tombol <b>Lamar Pekerjaan</b>, Anda harus mengerti dan mengaplikasikan setiap ketentuan dari situs kami ( Lowongan-Kerja.id ) sebagai berikut:</p>
								<ul class="list-group my-5" style="line-height: 25px;">
									<li><i class="fa fa-line-circle"></i>Iklan Lowongan Pekerjaan ini dibuat oleh <?php echo $data[0]['perusahaan']; ?> , kami tidak pernah mengubah / menambahkan / memvalidasi setiap lowongan kerja secara langsung. </li>
									<li><i class="fa fa-line-circle"></i>Semua iklan Lowongan Kerja ini adalah hasil dari<b> MENGUTIP LANGSUNG</b> dari web <b>Jobstreet</b>, kami TIDAK AKAN PERNAH meminta biaya baik secara langsung maupun melalui perusahaan bersangkutan.</li>
									<li><i class="fa fa-line-circle"></i>Segala transaksi yang terjadi saat Anda melamar dalam iklan <?php echo $data[0]['judul']; ?> di luar dari tanggung jawab kami.</li> <li>Di situs kami ini anda akan menemukan banyak link, berupa banner maupun text, ke situs lain. Tetapi kami tidak betanggungjawab atas isi dan akibat yang ditimbulkan dari situs-situs tersebut</li>
								</ul>
								<p><?php echo $data[0]['long_desc'] ?></p>
								<h4>Apakah <?php echo $data[0]['judul']; ?> Asli (Bukan Palsu)? </h4>
								
									<p>Harap pastikan bahwa <?php echo $data[0]['perusahaan']; ?> merupakan salah satu perusahaan terpercaya dan <i>kredibel</i> nya jelas. Silakan Anda periksa terlebih dahulu dan verifikasi apakah perusahaan itu benar-benar asli (bukan fiktif). Periksa juga tanggapan dari karyawan atau pegawai dari <?php echo $data[0]['perusahaan']; ?>. </p>
									<p>Berhati-hatilah dengan perusahaan yang hanya menggunakan alamat email publik/gratisan (seperti @gmail atau @yahoo.com) atau SMS (termasuk aplikasi sejenis TELEGRAM atau WHATSAPP ) sebagai media komunikasi. Perusahaan akan lebih meyakinkan jika memiliki telepon kantor sendiri atau alamat email domain web perusahaan. </p>
									<p> Jika Anda dimintai uang untuk alasan administrasi atau apapun, sebaiknya Anda HINDARI lowongan kerja tersebut. Beberapa alasan sering dipakai adalah biaya seragam, biaya training (pelatihan), biaya penggantian materai, dan membayar formulir/surat perjanjian.</li>
									<p>Pastikan bahwa lowongan yang Anda incar sesuai dengan judul dari lowongan ini, yaitu <?php echo $data[0]['judul']; ?> Pastikan Anda tidak ditawari bisnis investasi yang mencurigakan atau menjadi member MLM yang tidak jelas.</li>
								</ul>
								<div class="row">
									<div class="col-md-2">
										<h4>Bagikan di</h4>
									</div>
									<div class="col-md-10 mt-5">

<?php 
include 'application/SocialMedia.php';
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$sosmed = new SocialMedia();
$list = $sosmed->list();
$share = $sosmed->getLinks([
	'url'=> $url,
	'title'=> $data[0]['judul'],
	'image'=> $data[0]['logo'],
	'desc' => "Hei, ada lowongan kerja" .@$title. " nih",	
]);
foreach($list as $social_media_name) {
	$social_media_url = $share[$social_media_name];
	$sosmed_name = ucwords($social_media_name);
?>
<div style="display: inline-block;">
<a href="<?php echo $social_media_url; ?>" target="_blank"><img src="assets/imags/<?php echo $social_media_name; ?>.png" class="img-fluid" style="display: inline-block;" title="<?=$sosmed_name?>"></a>
</div>
<?php } ?>
									</div>
								</div>
							</div>
						</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<h5 class="text-dark">Artikel Terkait</h5>
			</div>
			<div class="col-md-4 my-5">
				<div class="card">
					<div class="card-header">
						<img class="img-fluid" src="assets/images/logo.png"></img>
					</div>
					<div class="card-body">
						<h4>Tips Melamar Kerja</h4>
						<p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
				<a class="d-block mt-4">Selengkapnya>></a>
					</div>
				</div>
			</div>
			<div class="col-md-4 my-5">
				<div class="card">
					<div class="card-header">
						<img class="img-fluid" src="assets/images/logo.png"></img>
					</div>
					<div class="card-body">
						<h4>Tips Melamar Kerja</h4>
						<p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
				<a class="d-block mt-4">Selengkapnya>></a>
					</div>
				</div>
			</div>
			<div class="col-md-4 my-5">
				<div class="card">
					<div class="card-header">
						<img class="img-fluid" src="assets/images/logo.png"></img>
					</div>
					<div class="card-body">
						<h4>Tips Melamar Kerja</h4>
						<p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
				<a class="d-block mt-4">Selengkapnya>></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include 'template/footer.php'; ?>
<?php include 'template/meta_footer.php'; ?>
<script type="text/javascript">

	$('#job-form').submit(function(e){
		e.preventDefault();
		$.ajax({
			type: "POST",
			url : "job.php",
			data: $('#job-form').serialize(),
			success: function(data){
				window.open('job.php','Lowongankerja.id - <?php echo $data[0]['judul'] ?>','height=420px,width=380px;location=yes;scrollbars=yes;');
			}
		})
		console.log('Success');
	})

	// function getJob(){
	// 	window.open('<?php echo $data[0]['url']; ?>','<?php echo $data[0]['judul']; ?>','width=360px,height=720px',status=1,scrollbars=yes)
	// }
</script>
</body>

</html>