<!doctype html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta name="author" content="<?php echo $set['title'] ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $set['title'] ?> &mdash; <?php echo $set['tag_line']; ?></title>
<?php include 'template/meta_head.php'; ?>
</head>
<body>
<?php include 'template/navbar.php'; ?>
		<section id="intro" style="height: 400px">
			<div class="carousel-item active" style="height: 400px">
				<div class="carousel-background"><img src="/assets/imags/slider/slider1.jpg" style="height: 400px" alt=""></div>
				<div class="carousel-container">
					<div class="carousel-content mt-5">
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
								<img src="/assets/imags/icone/service-icone-<?php echo $i+1; ?>.png" alt="">
							</div>
							<h6><?php echo $category[$i]['kategori']; ?></h6>
							<a href="/job.php?category=<?php echo strtolower($category[$i]['kategori']); ?>" class="button job_post" data-hover="View Jobs" data-active="I'M ACTIVE"><span><?php echo $myApp->countKat($category[$i]['kategori']);  ?> Job Posts</span></a>
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
				<div class="col-12">
					<?php echo $ads[0]['source_code']; ?>
				</div>
				<?php 
					$param = '';
					$page = '';
					$job = $myApp->showArtikel($param, $page);
					$i=0;
					foreach ($job as $data) {
						if (isset($job[$i])) {
						$a = explode("-", $job[$i]['judul']);
						$title = $a[0];
						$url_title = trim(str_replace(" ", "+", strtolower($title)),' ');
						$url = $job[$i]['id_lowongan']."_lowongan_".$url_title.".html";
						$date = date('d, F, Y', strtotime($job[$i]['date_tutup']));

				 ?>
				<div class="detail">
									<div class="media display-inline text-align-center">
										<div class="col-md-3 col-sm-12">
										<?php echo @$job[$i]['logo'] ? $job[$i]['logo'] : "<img class='img-fluid img-company-logo' id='img_company_logo_1' src='/assets/imags/logo_perusahaan.png' alt='Lowongan-Kerja.id'>"; ?>
										</div>
										<div class="mx-3 media-body text-left  text-align-center">
											<h6><?php echo $title; ?></h6>
												<div>
													<i class="large material-icons">account_balance</i>
													<span class="text"><?php echo  $a[1]; ?></span>
												</div>
												<div>
													<i class="large material-icons">place</i>
													<span class="text font-size"><?php echo ucwords($job[$i]['kota']); ?></span>
												</div>
												<div>
													<i class="large material-icons">money</i>
													<span class="text font-size"><?php echo @$_SESSION['user'] ? @$gaji : "Login untuk melihat gaji" ?></span>
												</div>
												<div>
													<i class="large material-icons">timer</i>
													<span class="text font-size">Ditutup <?php echo $date;?></span>
												</div>
												<div class="float-right margin-top text-align-center" style="z-index: 99">
													<a href="<?php echo $url; ?>" class="part-full-time">Lihat Detail</a>
												</div>
										</div>
									</div>
								</div>
			<?php } ?>
			<?php $i++; ?>
		<?php } ?>
				<div class="vertical-space-20"></div>
				<div class="job-list">
					<a href="job.php" class="Open-Jobs-Page margin-auto">Lihat Semua<i class="large material-icons float-right">trending_flat</i></a>
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