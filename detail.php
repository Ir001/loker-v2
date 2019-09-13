<?php 
$judul = $_GET['post'];
$id = $_GET['id'];
$post = $_GET['post'];
$data = $myApp->showDetail($post, $id);
$a = explode("-", $data[0]['judul']);
$title = $a[0];
$url_title = trim(str_replace(" ", "+", strtolower($title)));
$url = $data[0]['id_lowongan']."_lowongan_".$url_title.".html";
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
</head>
<body class="background-color-white-drak ">
<?php include 'template/navbar.php'; ?>


<section id="intro">
						<div class="carousel-item active">
							<div class="carousel-background"><img src="imags/slider/slider1.jpg" alt=""></div>
							<div class="carousel-container">
								<div class="carousel-content">
									<h2 class="font-color-white">Job Result</h2>
									<p class="font-color-white width-100"><a href="index.php" class="font-color-white">Home /</a><a href="<?php echo $url; ?>" class="font-color-white"> <?php echo $data[0]['judul']; ?> </a>/ Details
									</p>
								</div>
							</div>
						</div>
</section>


<section id="job-Details">
						<div class="container background-color-full-white job-Details">
							<div class="Exclusive-Product">
								<h3><?php echo $data[0]['judul']; ?></h3>
								<a href="#" class="Apply-Now">Lamar Pekerjaan</a>
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
									<li class="">Iklan Lowongan Pekerjaan ini dibuat oleh <?php echo $data[0]['perusahaan']; ?> , kami tidak pernah mengubah / menambahkan / memvalidasi setiap lowongan kerja secara langsung. </li>
									<li class="">Semua iklan Lowongan Kerja ini adalah hasil dari<b> MENGUTIP LANGSUNG</b> dari web <b>Jobstreet</b>, kami TIDAK AKAN PERNAH meminta biaya baik secara langsung maupun melalui perusahaan bersangkutan. </li>
									<li class="">Segala transaksi yang terjadi saat Anda melamar dalam iklan <?php echo $data[0]['judul']; ?> di luar dari tanggung jawab kami.</li> <li class="">Di situs kami ini anda akan menemukan banyak link, berupa banner maupun text, ke situs lain. Tetapi kami tidak betanggungjawab atas isi dan akibat yang ditimbulkan dari situs-situs tersebut</li>
								</ul>
								<p><?php echo $data[0]['long_desc'] ?></p>
								<h4>Apakah <?php echo $data[0]['judul']; ?> Asli (Bukan Palsu)? </h4>
								<ul class="list-group my-5" style="line-height: 25px">
									<li class="">Harap pastikan bahwa <?php echo $data[0]['perusahaan']; ?> merupakan salah satu perusahaan terpercaya dan <i>kredibel</i> nya jelas. Silakan Anda periksa terlebih dahulu dan verifikasi apakah perusahaan itu benar-benar asli (bukan fiktif). Periksa juga tanggapan dari karyawan atau pegawai dari <?php echo $data[0]['perusahaan']; ?>. </li>
									<li class=""> Berhati-hatilah dengan perusahaan yang hanya menggunakan alamat email publik/gratisan (seperti @gmail atau @yahoo.com) atau SMS (termasuk aplikasi sejenis TELEGRAM atau WHATSAPP ) sebagai media komunikasi. Perusahaan akan lebih meyakinkan jika memiliki telepon kantor sendiri atau alamat email domain web perusahaan.</li>
									<li class=""> Jika Anda dimintai uang untuk alasan administrasi atau apapun, sebaiknya Anda HINDARI lowongan kerja tersebut. Beberapa alasan sering dipakai adalah biaya seragam, biaya training (pelatihan), biaya penggantian materai, dan membayar formulir/surat perjanjian.</li>
									<li class="">Pastikan bahwa lowongan yang Anda incar sesuai dengan judul dari lowongan ini, yaitu <?php echo $data[0]['judul']; ?> Pastikan Anda tidak ditawari bisnis investasi yang mencurigakan atau menjadi member MLM yang tidak jelas.</li></ul>

							</div>
						</div>
</section>
<section id="comment" class="background-color-full-white-light">
						<div class="container">
							<div class="max-width-80">
								<h4>comment</h4>
								<a href="#" class="Share">Share</a>
								<div class="media border p-3">
									<img src="imags/comment1.png" alt="John Doe" class="mr-3 rounded-circle imagess" style="width:60px;">
									<div class="media-body">
										<h6>Rehmatun Nisal</h6>
										<p>Suspendisse augue pulvinar placerat himenaeos odio nec turpis augue sem maecenas, faucibus erat lacinia consectetur sapien suscipit vestibulum venenatis himenaeos.</p>
									</div>
								</div>
								<div class="media border p-3 ">
									<img src="imags/comment2.png" alt="John Doe" class="mr-3 rounded-circle imagess" style="width:60px;">
									<div class="media-body">
										<h6>Rehmatun Nisal</h6>
										<p>Suspendisse augue pulvinar placerat himenaeos odio nec turpis augue sem maecenas, faucibus erat lacinia consectetur sapien suscipit vestibulum venenatis himenaeos.</p>
									</div>
								</div>
								<div class="media border p-3 padding-none border-none">
									<img src="imags/comment3.png" alt="John Doe" class="mr-3 rounded-circle imagess" style="width:60px;">
									<div class="media-body">
										<form>
											<textarea placeholder="Type commeny" required></textarea>
											<button class="Post">Post</button>
										</form>
									</div>
								</div>
							</div>
						</div>
</section>
<?php include 'template/fotoer.php'; ?>
<?php include 'template/meta_footer.php'; ?>
</body>

</html>