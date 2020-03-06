
	<header class="header">
		<div class="header_container background-color-orange-light">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="<?=$set['base_url']?>">
									<img src="/assets/images/logo.png" style="max-height: 49px; max-width: 220px" class="logo-text" alt="">
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li><a href="<?=$set['base_url']?>">Home</a></li>
									<li><a href="<?=$set['base_url']?>about.php">About</a></li>
									<li><a href="<?=$set['base_url']?>blog" target="_blank">Blog</a></li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="down" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
											Kategori
										</a>
										<div class="dropdown-menu" aria-labelledby="down">
											<?php 
												$listcategory = $myApp->showKategori(7);
												$i=0;
												foreach ($listcategory as $kat) {
													?>
												<a class="dropdown-item" href="<?=$set['base_url']?>job.php?kategori=<?php echo strtolower($kat['kategori']); ?>"><?php echo $kat['kategori']; ?></a>								
											<?php $i++; } ?>
										</div>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="down_lokasi" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
											Wilayah
										</a>
										<div class="dropdown-menu" aria-labelledby="down_lokasi">
											<?php 
												$listlokasi = $myApp->getLokasi(7);
												$i=0;
												foreach ($listlokasi as $kat) {
													?>
												<a class="dropdown-item" href="<?=$set['base_url']?>job.php?wilayah=<?php echo strtolower($kat['lokasi']); ?>"><?php echo ucwords($kat['lokasi']); ?></a>								
											<?php $i++; } ?>
										</div>
									</li>
								</ul>
								<div class="hamburger menu_mm menu-vertical">
									<i class="large material-icons font-color-white menu_mm menu-vertical">menu</i>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
			<div class="menu_close_container">
				<div class="menu_close">
					<div></div>
					<div></div>
				</div>
			</div>
			<div class="search">
				<form action="search.php" class="header_search_form menu_mm">
					<input type="search" name="keyword" class="search_input menu_mm" placeholder="Search" required="required">
					<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
						<i class="fa fa-search menu_mm" aria-hidden="true"></i>
					</button>
				</form>
			</div>
			<nav class="menu_nav">
				<ul class="menu_mm">
					<li class="menu_mm"><a href="<?=$set['base_url']?>">Home</a></li>
					<li class="menu_mm"><a href="<?=$set['base_url']?>about.php">About</a></li>
					<li class="menu_mm"><a href="http://lowongan-kerja.id/blog" target="_blank">Blog</a></li>
					<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="down" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
											Kategori
										</a>
										<div class="dropdown-menu" aria-labelledby="down">
											<?php 
												$listcategory = $myApp->showKategori(3);
												$i=0;
												foreach ($listcategory as $kat) {
													?>
												<a class="dropdown-item" href="<?=$set['base_url']?>job.php?kategori=<?php echo strtolower($kat['kategori']); ?>"><?php echo substr($kat['kategori'], 0, 7)."..."; ?></a>								
											<?php $i++; } ?>
										</div>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="down_lokasi" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
											Wilayah
										</a>
										<div class="dropdown-menu" aria-labelledby="down_lokasi">
											<?php 
												$listlokasi = $myApp->getLokasi(3);
												$i=0;
												foreach ($listlokasi as $kat) {
													?>
												<a class="dropdown-item" href="<?=$set['base_url']?>job.php?wilayah=<?php echo strtolower($kat['lokasi']); ?>"><?php echo ucwords($kat['lokasi']); ?></a>								
											<?php $i++; } ?>
										</div>
									</li>
				</ul>
			</nav>
		</div>
	</header>