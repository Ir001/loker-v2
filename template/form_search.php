<div id="search-box" class="margin-none">
	<div class="container search-box">
		<form action="job.php" id="search-box_search_form_3" class="search-box_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between">
			<div class="d-flex flex-row align-items-center justify-content-start inline-block">
				<span class="large material-icons search">search</span>
				<input name="keyword" class="search-box_search_input" placeholder="Posisi, Jabatan, Perusahaan" required="required" type="search">
				<select name="kategori" class="dropdown_item_select search-box_search_input">
					<option value="all">Semua</option>
				<?php 
					$listcategory = $myApp->showKategori();
					$i=0;
					foreach ($listcategory as $list) {
				 ?>
					<option value="<?php echo strtolower($list['kategori']); ?>"><?php echo $list['kategori']; ?></option>
				<?php $i++; } ?>
				</select>
					<span class="large material-icons search">place</span>
					<select name="lokasi"  class="dropdown_item_select search-box_search_input">
						<option value="">Pilih Kota</option>
						<?php 
							$listcategory = $myApp->showKota();
							$i=0;
							foreach ($listcategory as $list) {
						 ?>
						<option value="<?php echo strtolower($list['kota']); ?>"><?php echo ucwords($list['kota']); ?></option>
				<?php $i++; } ?>
					</select>
					<span class="clearfix"></span>
					<span class="select" style="margin-top: -200px"></span>

				
			</div>
			<button type="submit" class="search-box_search_button">Cari</button>
		</form>
	</div>
</div>