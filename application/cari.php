<?php
if(!isset($myApp)){
  echo "<h2>Anda tidak diperbolehkan mengakses halaman ini</h2>";
  exit();
}
?>

<div class="">
  <div class="box-header with-border">
    <?php
      if(isset($_GET['keyword']) OR isset($_GET['wilayah'])):
        include 'funcSearch.php';
    ?>
  <form action="index.php?page=cari">
      <div class="form-group">
        <input type="hidden" name="page" value="cari">
        <input type="text" class="form-control" value="<?php echo @$_GET['keyword']; ?>" placeholder="Kata Kunci" name="keyword" required>
        <select name="wilayah" class="form-control">
          <option value="" selected disabled>Pilih Wilayah</option>
          <?php 
            $data_kota = $myApp->showKota();
            foreach ($data_kota as $key) {
           ?>
          <option value="<?php echo $key['kota']; ?>"><?php echo ucwords($key['kota']); ?></option>
           <?php 
              }
           ?>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Cari</button>
      </div>
    </form>
  <h3 class="box-title">Hasil Pencarian</h3>
  </div><!-- /.box-header -->
  <p>Hasil pencarian <i><?php echo @$_GET['keyword']; ?></i> <?php
    if(isset($_GET['wilayah'])):
      echo "di Wilayah ".ucwords($_GET['wilayah']);
    endif
  ?></p>
  <div class="box-body">
      <?php 
            $i = 0;
            // print_r($data);
            foreach ($data as $val){
                if(isset($data[$i])){
                    print_r('<li class="item">
                        <div class="product-img">
                        ' . $data[$i]['logo'] . '
                        </div>
                        <div class="product-info">
                        <a href="' . $data[$i]['id_lowongan'] . '_lowongan_' . $data[$i]['permalink'] . '.html" class="product-title">' . $data[$i]['judul'] . ' <span class="label label-success pull-right">Read More</span></a><br>
                        ' . $data[$i]['lokasi'] . ' | 
                        <b>' . $data[$i]['dibuka'] . '</b> | 
                        <b>' . $data[$i]['ditutup'] . '</b><br>
                        <span class="product-description">
                        ' . $data[$i]['short_desc'] . '
                        </span>
                        </div>
                        </li>
                        ');
                }
                $i++;
              }
           

   ?>
    <div class="col-md-12">
            <ul id="pagination_panel" class="pagination pull-left" data-omni="">
            </ul>
            <div class="light-pagination"></div>
        </div>

        <?php
                                // Langkah 3 : Hitung Total data dan halaman serta link 1,2,3..
        $jmldata = $data['jmldata'];
        $jmlhalaman = $data['jmlhalaman'];
        $halaman = @$_GET['hal']?$_GET['hal']:1;

        if ($halaman >100){
            $mulai = $halaman;
        }else{
            $mulai = 1;
        }
        ?>
  </div><!-- /.box-body -->
</div>
  <?php else: ?>
    <h3 class="box-title">Cari Lowongan Pekerjaan</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <form action="index.php?page=cari">
      <div class="form-group">
        <input type="hidden" name="page" value="cari">
        <input type="text" class="form-control" placeholder="Kata Kunci" name="keyword" required>
        <select name="wilayah" class="form-control">
          <?php 
            $data_kota = $myApp->showKota();
            foreach ($data_kota as $key) {
           ?>
          <option value="<?php echo $key['kota']; ?>"><?php echo ucwords($key['kota']); ?></option>
           <?php 
              }
           ?>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Cari</button>
      </div>
    </form>
  </div><!-- /.box-body -->
</div>
<?php endif; ?>

