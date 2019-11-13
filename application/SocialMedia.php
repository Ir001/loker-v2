<?php

	class SocialMedia
	{
					# All Social Media Sites
					# -------------------------------------------------
		
				# All Social Media Sites ~ Nice Names
				# -------------------------------------------------
				
		public function GetSocialMediaSites_NiceNames()
		{
			return [
				
				'facebook'=>'Facebook',
				'pinterest'=>'Pinterest',
				'twitter'=>'Twitter',
			];
		}
		
				# Social Media Sites With Share Links
				# -------------------------------------------------
		
		public function list()
		{
			return [
				'twitter',
				'facebook',
				'pinterest',
			];
		}
		
		public function getLinks($args)
		{
			$url = urlencode($args['url']);
			$title = urlencode($args['title']);
			$image = urlencode($args['image']);
			$desc = urlencode($args['desc']);
			
			
			$text = $title;
			
			if($desc) {
				$text .= '%20%3A%20';	# This is just this, " : "
				$text .= $desc;
			}
			
				// conditional check before arg appending
			
			return [
				
				'facebook'=>'http://www.facebook.com/sharer.php?u=' . $url,
				'pinterest'=>'http://pinterest.com/pin/create/button/?url=' . $url ,
				'twitter'=>'https://twitter.com/intent/tweet?url=' . $url . '&text=' . $text . '&via=',
			];
		}
	}

?>