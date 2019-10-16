<?php 
	function getBlog(){
		$url_blog = 'http://lowongan-kerja.id/blog/wp-json/wp/v2/posts';
		$json = json_decode(file_get_contents($url_blog));
		$total_blog = count($json);
		$i=0;
		while ($i < $total_blog) {
			$data[$i]['link'] =  $json[$i]->link;
			$data[$i]['title'] =  $json[$i]->title->rendered;
			$data[$i]['content'] =  $json[$i]->excerpt->rendered;
			$i++;
		}
		return @$data;
	}
	
 ?>