<footer id="footer" class="background-color-white">
	<div class="container">
		<div class="vertical-space-100"></div>
		<div class="row">
			<div class="col-lg-4 col-md-6 vertical-space-200">
				<h5>Tentang Kami</h5>
				<p class="paregraf" style="margin-bottom: 50px"><a href="<?=$set['base_url'];?>">Lowongan Kerja ID</a> adalah portal lowongan kerja terbaik yang bisa anda temukan di indonesia. Kami akan memberikan pelayanan informasi lowongan kerja terbaik untuk anda, dan ikut serta dalam mengurangi pengangguran di Indonesia.</p>
				<div class="my-4">
					<a href="https://www.facebook.com/" rel="nofollow"><i class="fa fa-facebook social-icon"></i></a>
					<a href="https://www.twitter.com/" rel="nofollow"><i class="fa fa-twitter social-icon"></i></a>
					<a href="https://www.fa-pinterest.com/" rel="nofollow"><i class="fa fa-pinterest-p social-icon"></i></a>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 vertical-space-2">
				<h5>Halaman</h5>
				<div class="text">
					<a title="Tentang Kami" href="<?=$set['base_url']?>about.php">About</a>								
					<a title="Privacy Policy" href="<?=$set['base_url']?>privacy-policy.php">Privacy Policy</a>
					<a title="FAQ" href="<?=$set['base_url']?>faq.php">FAQ</a>	
					<a title="Kontak Kami" href="<?=$set['base_url']?>contact.php">Contact Us</a>								
				</div>
			</div>
			<div class="col-lg-2 col-md-6 vertical-space-2">
				<h5>Wilayah</h5>
				<div class="text">
					<?php 
					$listlokasi = $myApp->getLokasi(4);
					$i=0;
					foreach ($listlokasi as $kat) {
						?>
						<a href="<?=$set['base_url']?>job.php?wilayah=<?php echo strtolower($kat['lokasi']); ?>"><?php echo ucwords($kat['lokasi']); ?></a>								
						<?php $i++; } ?>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 vertical-space-2">
					<h5>Sponsor</h5>
					<div class="vertical-space-30"></div>
					<?php $ads = $myApp->getAds("sidebar"); ?>
					<?php echo $ads[0]['source_code']; ?>
				</div>
			</div>
			<div class="vertical-space-60"></div>
		</div>
	</footer>