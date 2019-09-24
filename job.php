<?php 
	require 'application/grab.php';
	include 'application/funcSearch.php';
	if (isset($_GET['keyword'])) {
		$keyword  = htmlspecialchars(mysqli_real_escape_string($conn, @$_GET['keyword'] ? $_GET['keyword'] : ""));
		$kategori  = htmlspecialchars(mysqli_real_escape_string($conn, @$_GET['kategori'] ? $_GET['kategori'] : ""));
		$lokasi  = htmlspecialchars(mysqli_real_escape_string($conn, @$_GET['lokasi'] ? $_GET['lokasi'] : ""));
		$job = $search->getSearch($keyword, $kategori, $lokasi);
		 // $job = $myApp->cariArtikel($keyword, $kategori, $lokasi);
	}else{
		$param = '';
		$page = '';
		$job = $myApp->showArtikel($param, $page);
	}
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

	<title>Loker.id - Cari Pekerjaan Mudah</title>
	<?php include 'template/meta_head.php'; ?>
	<style type="text/css">
		.list{font-family:proxima nova rg;font-size:16px;font-weight:400;margin-bottom:20px;padding-left:33px}
		.box{
			background-color:#fff;margin-bottom:20px;padding:23px 35px 42px 20px;text-align:left;
		}
	</style>


</head>
<body>
<?php include 'template/navbar.php'; ?>
<section style="min-height: 180px; background: #f8f8f8">
	
</section>

<?php include 'template/form_search.php'; ?>


<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-85"></div>
<div class="container text-center">
							<h4 class="text-left">Filter Jobs Result</h4>
							<div class="vertical-space-30"></div>
							<div class="row">
								<div class="col-lg-4 col-md-12">
									<div class="box">
										<p class="title" style="font-weight: 700">Job Category</p>
										<ul style="padding-top: 20px">
											<?php 
												$listcategory = $myApp->showKategori();
												$i=0;
												foreach ($listcategory as $kat) {
											 ?>
											<li class="list"><a href="job.php?kategori=<?php echo strtolower($kat['kategori']); ?>" class="font-color-black"><?php echo $kat['kategori']; ?> (<?php echo $myApp->countKat($kat['kategori']);  ?>)</a></li>
											<?php $i++; } ?>
										</ul>
									</div>
									<div class="box">
										<p class="title" style="font-weight: 700">Industry</p>
										<ul style="padding-top: 20px">
											<?php 
												$listindustri = $myApp->getIndustri();
												$i=0;
												foreach ($listindustri as $kat) {
											 ?>
											<li class="list"><a href="#" class="font-color-black"><?php echo $kat['industri']; ?></a></li>
											<?php $i++; } ?>
										</ul>
									</div>
								</div>

								<div class="col-lg-8 col-md-12">
								<?php 
									if ($job=="nothing") {
									?>
									<h3>Tidak ada data yang cocok</h3>
									<a href="job.php" class="my-5">< Kembali</a>
									<?php
									}else{
										// print_r($job);
									$i=0;
									foreach ($job as $data) {
										if (isset($job[$i])) {
										$a = explode("-", $job[$i]['judul']);
										$title = $a[0];
										$url_title = trim(str_replace(" ", "+", strtolower($title)),' ');
										$url = $job[$i]['id_lowongan']."_lowongan_".$url_title.".html";
										$date = date('d, F, Y', strtotime($job[$i]['date_tutup']));
								 ?>
								<div class="detail width-100">
									<div class="media display-inline text-align-center">
										<?php echo $job[$i]['logo']; ?>
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
								<?php }} ?>
									<div class="vertical-space-20"></div>
									<div class="vertical-space-25"></div>
									<div class="job-list width-100">
										<ul id="pagination_panel" class="pagination" data-omni="">
            							</ul>
            							<div class="light-pagination"></div> 
									
									</div>
								</div>
							</div>
</div>
<div class="vertical-space-60"></div>
</section>

<?php include 'template/footer.php'; ?>
<?php include 'template/meta_footer.php'; ?>
<script type="text/javascript">
	<?php
	$item = $job['jmlhalaman'];
	if (isset($_GET['page'])) {
		$last = $_SERVER['REQUEST_URI'];
		$a =  explode("page", $last);
		$b = trim($a[0], "&");
		$url = 'http://'.$_SERVER['HTTP_HOST'].$b."&";

	 }else{
		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?";
	} 

	?>
	var paging = function () {
			let curentUri = "<?php echo $url; ?>";
            $(function() {
                $('.light-pagination').pagination({
                    items: <?php echo $item; ?>,
                    currentPage : <?php echo @$_GET['page']?$_GET['page']:1; ?>,
                    cssStyle: 'light-theme',
                    prevText: '<',
                    nextText: '>',
                    onPageClick: function (val) {
                        window.location=curentUri+"page="+val;
                    }
                });
            });
        };
        paging();
</script>
</body>
</html