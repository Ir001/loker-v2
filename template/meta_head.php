<?php 
	if(isset($_GET['page'])) {
		switch ($_GET['page']) {
			case 'lowongan':
				echo "<meta name='description' content='".$data[0]['judul']."'>\n";
				echo "<meta name='keywords' content='".$data[0]['judul']."'>\n";
				break;
			default:
				echo "<meta name='description' content='".$set['description']."'>\n";
				echo "<meta name='keywords' content='".$set['keywords']."'>\n";
				break;
		}
	}else{
		echo "<meta name='description' content='".$set['description']."'>\n";
		echo "<meta name='keywords' content='".$set['keywords']."'>\n";
	}
 ?>
<!-- Adsense -->
<?php echo $set['adsense']."\n"; ?>
<!-- Tag Manager -->
<?php echo $set['tag_manager']."\n"; ?>
<!-- Meta -->
<script></script>

<script src="assets/js/4n2NXumNjtg5LPp6VXLlDicTUfA.js"></script>
<link rel="apple-touch-icon" href="assets/images/favicon.png">
<link rel="shortcut icon" type="image/ico" href="assets/images/favicon.png" />
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/matrialize.css" rel="stylesheet">
<link href="assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/paging/page.css">
<link rel="stylesheet" href="assets/css/style.css">
