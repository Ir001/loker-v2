<?php 
require 'application/grab-v2.php';
$data = $myApp->getContent('about');
?>
<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $set['title'] ?> &mdash; <?php echo $data['title']; ?></title>

	<?php include 'template/meta_head.php'; ?>
	<style type="text/css">
		div, p, ul li{
			font-family: 'Roboto', sans-serif;
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
				<h3><?php echo $data['title']; ?></h3>
				<div class="row">
					<div class="col-md-10">
					</div>
					<div class="col-md-2">
						<div class="pt-3">
							<div id="google_translate_element2"></div>
						</div>
					</div>
				</div>
				<?php $ads = $myApp->getAds("content"); ?>
				<?php echo $data['content'];?>				

					<div class="row">
						
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
							$url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
							$sosmed = new SocialMedia();
							$list = $sosmed->list();
							$share = $sosmed->getLinks([
								'url'=> $url,
								'title'=> $data['title'],
								'image'=> null,
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
		
	</body>
	</html>