<?php 
require 'application/grab-v2.php';
date_default_timezone_set('Asia/Jakarta');
$id = @trim($_GET['id']);
$post = $_GET['post'];
$data = $myApp->showDetail($post, $id);
$perusahaan = $data[0]['perusahaan'];
$id_loker = $data[0]['id_lowongan'];
$judul = explode("-", $data[0]['judul']);
$low_judul = strtolower($judul[0]);
$exp_judul = explode("/", $low_judul);
$title = str_replace(" ", "-", $exp_judul[0]);
$title = trim($title, "-");
						// 
$url = $set['base_url']."detail/".$id_loker."/".$title;
$date = date('d, F, Y', strtotime($data[0]['date_tutup']));
// 

?>
<!doctype html>
<html lang="id"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $set['title'] ?> &mdash; <?php echo $data[0]['judul']; ?></title>

	<?php include 'template/meta_head.php'; ?>
	<style type="text/css">
		div, p, ul li{
			font-family: 'Roboto', sans-serif;
		}
		li{
			margin-left: 25px;
			line-height: 29px;
		}
		#company_overview_all, 
		p,
		p#why_join_us > div,
		p#why_join_us + div,
		.cmpy_desc_p > div
		{
			line-height: 26px;
		}
		h1#position_title {
			display: block;
		    margin-left: 15px;
		    margin-top: 10px;
		    font-size: 22px;
		    font-family: 'Roboto', sans-serif;
		}

	</style>
</head>
<body class="background-color-white-drak ">
	<?php include 'template/navbar.php'; ?>



	<section id="job-Details" style="margin-top: 120px !important">

		<div class="container background-color-full-white job-Details">
			<div class="Exclusive-Product">
				<h3><?php echo $data[0]['judul']; ?></h3>
				<div class="row">
					<div class="col-md-10">
						<h6 class="font-color-orange"><?php echo $perusahaan ?></h6>
					</div>
					<div class="col-md-2">
						<div class="pt-3">
							<div id="google_translate_element2"></div>
						</div>
					</div>
				</div>
				
				
				<div class="my-5">
					<?php echo $data[0]['logo']; ?>
				</div>
				<?php $ads = $myApp->getAds("content"); ?>
				<?php echo $ads[0]['source_code']; ?>
				<p>Sebelum Anda melamar lowongan <?php echo $data[0]['judul']; ?> ini atau menekan tombol <b>Lamar Pekerjaan</b>, Anda harus mengerti dan mengaplikasikan setiap ketentuan dari situs kami ( Lowongan-Kerja.id ) sebagai berikut:</p>
				<ul class="list-group my-5" style="line-height: 25px;">
					<li><i class="fa fa-line-circle"></i>Iklan Lowongan Pekerjaan ini dibuat oleh <?=$perusahaan;?> , kami tidak pernah mengubah / menambahkan / memvalidasi setiap lowongan kerja secara langsung. </li>
					<li><i class="fa fa-line-circle"></i>Semua iklan Lowongan Kerja ini adalah hasil dari<b> MENGUTIP LANGSUNG</b> dari web <b>Jobstreet</b>, kami TIDAK AKAN PERNAH meminta biaya baik secara langsung maupun melalui perusahaan bersangkutan.</li>
					<li><i class="fa fa-line-circle"></i>Segala transaksi yang terjadi saat Anda melamar dalam iklan <?php echo $data[0]['judul']; ?> di luar dari tanggung jawab kami.</li> <li>Di situs kami ini anda akan menemukan banyak link, berupa banner maupun text, ke situs lain. Tetapi kami tidak betanggungjawab atas isi dan akibat yang ditimbulkan dari situs-situs tersebut</li>
				</ul>
				<h4>Informasi Perusahaan</h4>
				<p><?php echo $data[0]['tentang_pers'] ?></p>
				<div class="clean"></div>
				<h4>Gambaran Perusahaan</h4>
				<div class="row pl-3">
						<?php echo $data[0]['gambaran_pers'] ?>
				</div>
				
				<h4>Deskripsi Pekerjaan</h4>
				<p><?php echo $data[0]['long_desc'] ?></p>
				<h4>Mengapa Bergabung Dengan Kami?</h4>
				<p style="line-height: 30px !important;">
					<?php 
					$why = trim($data[0]['mengapa']);
					echo $why;
					?>
				</p>
				<div class="clean"></div>
				<div class="row">
					<div class="col-md-6 pt-4">
						<?php 
						$uri = explode('?fr', $data[0]['url']);
						$url2 = explode('-', $uri[0]);
						$jmlData = count($url2);
						$idJob = $url2[$jmlData-1];
						?>
						<form id="apply-now-link">
							<input type="hidden" value="<?php echo "$idJob"; ?>" name="job_id" id="job_id">
							<input type="hidden" value="40" name="s" id="s">
							<input type="hidden" value="1" name="AdvertisementSource" id="AdvertisementSource">
							<input type="hidden" name="fr" id="fr" value="">
							<button id="apply_button" type="submit" class="Apply-Now float-left">Lamar Sekarang</button>
						</form>
					</div>
				</div>
				<h4>Apakah <?php echo $data[0]['judul']; ?> Asli (Bukan Palsu)? </h4>
				<p>Harap pastikan bahwa <?=$perusahaan; ?> merupakan salah satu perusahaan terpercaya dan <i>kredibel</i> nya jelas. Silakan Anda periksa terlebih dahulu dan verifikasi apakah perusahaan itu benar-benar asli (bukan fiktif). Periksa juga tanggapan dari karyawan atau pegawai dari <?=$perusahaan; ?>. </p>
				<p>Berhati-hatilah dengan perusahaan yang hanya menggunakan alamat email publik/gratisan (seperti @gmail atau @yahoo.com) atau SMS (termasuk aplikasi sejenis TELEGRAM atau WHATSAPP ) sebagai media komunikasi. Perusahaan akan lebih meyakinkan jika memiliki telepon kantor sendiri atau alamat email domain web perusahaan. </p>
				<p> Jika Anda dimintai uang untuk alasan administrasi atau apapun, sebaiknya Anda HINDARI lowongan kerja tersebut. Beberapa alasan sering dipakai adalah biaya seragam, biaya training (pelatihan), biaya penggantian materai, dan membayar formulir/surat perjanjian.</li>
					<p>Pastikan bahwa lowongan yang Anda incar sesuai dengan judul dari lowongan ini, yaitu <?php echo $data[0]['judul']; ?> Pastikan Anda tidak ditawari bisnis investasi yang mencurigakan atau menjadi member MLM yang tidak jelas.</li>
					</ul>		

					<div class="row">
						<div class="col-md-12">
							<h4>Alamat Perusahaan <?php echo $data[0]['perusahaan']; ?></h4>
							<p><i class="material-icons">place</i> <?php echo $data[0]['perusahaan'].",".$data[0]['alamat'] ?></p>
							<a href="https://www.google.com/maps/search/<?php echo $data[0]['perusahaan']; ?>" target="_blank" rel="nofollow" class="float-left mt-3">Lihat di Google Maps</a>
							<a href="job.php?kategori=<?php echo strtolower($data[0]['kategori']); ?>" class="mt-3 mr-5">Lihat loker sejenis</a>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 pt-3">
							<?php $ads = $myApp->getAds("detail-bottom"); ?>
							<?php echo $ads[0]['source_code']; ?>
						</div>
						<div class="clearfix"></div>

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
									<a href="<?php echo $social_media_url; ?>" rel="nofollow"><img src="/assets/imags/<?php echo $social_media_name; ?>.png" class="img-fluid" style="display: inline-block;" title="<?=$sosmed_name?>"></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 my-4">
						<h3 class="text-dark">Artikel Terkait</h3>
					</div>
					<?php 
					include 'application/getBlog.php';
					$blog = getBlog();

					foreach ($blog as $blog) {
						?>
						<div class="col-md-4 mb-2">
							<div class="card">
								<div class="card-body">
									<h4><?=$blog['title']['rendered'];?></h4>
									<p class="mt-4"><?php echo substr($blog['excerpt']['rendered'], 0, 200);?>...</p>
									<a href="<?=$blog['link'];?>" class="d-block mt-4">Selengkapnya>></a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<!-- GTranslate: https://gtranslate.io/ -->

		<script type="text/javascript">
			function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
		</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


		<script type="text/javascript">
			/* <![CDATA[ */
			eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
			/* ]]> */
		</script>


		<?php include 'template/footer.php'; ?>
		<?php include 'template/meta_footer.php'; ?>
		<script type="text/javascript">
			$('.panel-clean').removeClass('panel').addClass('card');
			$('.panel-body').removeClass('panel-body').addClass('card-body');
			$('.table-location-div').removeClass('col-lg-4 col-md-4 col-sm-4').addClass('col-12');
			$('.col-xs-12').removeClass('col-lg-6 col-md-6 col-sm-5').addClass('col-12');
			$('.col-xs-12').removeClass('col-lg-2 col-md-2 col-sm-3').addClass('col-12');
			$('#multiple_work_location_link').addClass('d-none');
			$('.job-info-wrap').addClass('pt-4');

			$('#apply-now-link').submit(function(e){
				e.preventDefault();
				$.ajax({
					type: "POST",
					url : "http://myjobstreet-id.jobstreet.co.id/application/online-apply.php",
					headers: {
						'Authorization':'Basic 2342423wfdwer',
						'X-CSRF-TOKEN':'sfwfwewerwdsfwe',
						'Content-Type':'application/x-www-form-urlencoded'
					},
					data: $(this).serialize(),
					success: function(data){
						getJob();
					}
				})
				getJob();
			})

			function getJob(){
				window.open('<?php echo $data[0]['url']; ?>','<?php echo $data[0]['judul']; ?>','height=420px,width=380px;location=yes;scrollbars=yes');
			}
			// Logo
			//
			var logo_parrent = $('.logo_sm_wrap');
			var img = logo_parrent.find('img');
			var src = img.attr("data-original");
			img.attr("src", src);
		</script>
	</body>
	</html>
	<?php 
	if ($set['auto_grab'] == "on") {
		$kd_location = $set['kd_location'];
		$url = 'http://www.jobstreet.co.id/id/job-search/job-vacancy.php?key=&location='.$kd_location.'&specialization=&area=&salary=&ojs=3&src=1';
    //$myApp->insert($url, "");
	}
	?>