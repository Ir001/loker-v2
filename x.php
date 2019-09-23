<h3>Share to:</h3>

<?php 
include 'application/SocialMedia.php';
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$sosmed = new SocialMedia();
$list = $sosmed->list();
$share = $sosmed->getLinks([
	'url'=> $url,
	'title'=> @$title,
	'image'=> @$img,
	'desc' => "Hei, ada lowongan kerja" .@$title. " nih",	
]);
foreach($list as $social_media_name) {
	$social_media_url = $share[$social_media_name];
	$sosmed_name = ucwords($social_media_name);
?>
<a href="<?php echo $social_media_url; ?>" target="_blank"><img src="assets/img/<?php echo $social_media_name; ?>" alt="<?=$sosmed_name?>"></a> |
<?php } ?>