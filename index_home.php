<!doctype html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta name="author" content="John Doe">
	<meta name="description" content="">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Loker.id - Home</title>
<?php include 'template/meta_head.php'; ?>
</head>
<body>
<?php include 'template/navbar.php'; ?>
		<section id="intro">
			<div class="carousel-item active">
				<div class="carousel-background"><img src="assets/imags/slider/slider1.jpg" alt=""></div>
				<div class="carousel-container">
					<div class="carousel-content">
						<h2 class="font-color-white">Cari Dengan Mudah Pekerjaan Sesuai Pasionmu</h2>
						<p class="font-color-white">Temukan lebih dari 10.000 informasi terbaru lowongan pekerjaan di seluruh Indonesia.</p>

					</div>
				</div>
			</div>
		</section>
<?php include 'template/form_search.php'; ?>
		<section id="Job-Category" style="margin-top: 90px">
			<div class="container">
				<h3 class="text-center">Kategori Pekerjaan</h3>
				<div class="vertical-space-30"></div>
				<div class="vertical-space-60"> </div>
				<div class="row">
					<?php 
						$category = $myApp->thumbKat();
						$i=0;
						foreach ($category as $key) {
					 ?>
					<div class="col-lg-3 col-md-6 max-width-50">
						<div class="box background-color-white-light">
							<div class="circle">
								<img src="assets/imags/icone/service-icone-<?php echo $i+1; ?>.png" alt="">
							</div>
							<h6><?php echo $category[$i]['kategori']; ?></h6>
							<a href="job.php?category=<?php echo strtolower($category[$i]['kategori']); ?>" class="button job_post" data-hover="View Jobs" data-active="I'M ACTIVE"><span><?php echo $myApp->countKat($category[$i]['kategori']);  ?> Job Posts</span></a>
						</div>
					</div>
					<?php $i++; ?>
					<?php } ?>
				</div>
				<div class="vertical-space-40"></div>
				<a href="job.php" class="Brows-All-Category" style="text-align: center;">Lihat Semua Kategori</a>
			</div>
			<div class="vertical-space-85"></div>
		</section>
		<section id="resent-job-post" class="background-color-white">
			<div class="vertical-space-85"></div>
			<div class="container text-center">
				<h3 class="text-center">Lowongan Pekerjaan Terbaru</h3>
				<div class="vertical-space-30"></div>
				<p class="max-width">Informasi Lowongan Pekerjaan Terbaru Minggu Ini.
				</p>
				<div class="vertical-space-60"></div>
				<?php 
					$param = '';
					$page = '';
					$job = $myApp->showArtikel($param, $page);
					$i=0;
					foreach ($job as $data) {
						if (isset($job[$i])) {
						$a = explode("-", $job[$i]['judul']);
						$title = $a[0];
						$url_title = trim(str_replace(" ", "+", strtolower($title)));
						$url = $job[$i]['id_lowongan']."_lowongan_".$url_title.".html";
				 ?>
				<div class="detail">
					<div class="media display-inline text-align-center">
						<?php echo $job[$i]['logo']; ?>
						<div class="mx-3 media-body text-left  text-align-center">
							<h6><?php echo $title; ?></h6>
							<i class="large material-icons">account_balance</i>
							<span class="text"><?php echo  $a[1]; ?></span>
							<br/>
							<i class="large material-icons">place</i>
							<span class="text font-size"><?php echo ucwords($job[$i]['kota']); ?></span>
							<div class="float-right margin-top text-align-center">
								<a href="<?php echo $url; ?>" class="part-full-time">Lihat Detail</a>
								<p class="date-time">Deadline: <?php echo $job[$i]['date_tutup']; ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php $i++; ?>
		<?php } ?>
				<div class="vertical-space-20"></div>
				<div class="job-list">
					<a href="job.php" class="Open-Jobs-Page margin-auto">Open Jobs Page<i class="large material-icons float-right">trending_flat</i></a>
					<ul class="pagination justify-content-end margin-auto">
						<li class="page-item"><a class="page-link pdding-none" href="javascript:void(0);"><i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_left</i></a></li>
						<li class="page-item"><a class="page-link active" href="job.php?page=1">1</a></li>
						<li class="page-item"><a class="page-link" href="job.php?page=2">2</a></li>
						<li class="page-item"><a class="page-link" href="job.php?page=3">3</a></li>
						<li class="page-item"><a class="page-link" href="job.php?page=4">4</a></li>
						<li class="page-item">
							<a class="page-link pdding-none" href="javascript:void(0);"> <i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_right</i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="vertical-space-60"></div>
		</section>

<?php include 'template/footer.php'; ?>
<?php include 'template/meta_footer.php'; ?>


	
</body>

</html>