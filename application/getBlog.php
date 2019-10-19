<?php 
	function getBlog(){
		$url="http://lowongan-kerja.id/blog/wp-json/wp/v2/posts?per_page=3";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        $posts = json_decode($result, true);
        return @$posts;
	}

 ?>