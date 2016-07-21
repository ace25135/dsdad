<?php
// make sure you have enough time to download all pictures
ini_set('max_execution_time', 6000);
ini_set('memory_limit', '64M');
// include the Facebook PHP SDK - https://github.com/facebook/php-sdk/
require 'Facebook.php';
// enter your App ID and App Secret
// register an FB App at https://developers.facebook.com/apps/
$app_id = '198193930582303';
$app_secret = '753579bfc36f9410f0e8cfac70f73e23';
// enter the ID of the page for which you'd like to download photos
$page_id = '100000339074164';
$fb = new Facebook(array('appId'=>$app_id, 'secret'=>$app_secret));
$fb->getAccessToken();
echo '<pre>';
// get all albums for that page
$albums = $fb->api(array('method'=>'fql.query', 'query'=>'SELECT object_id, name FROM album WHERE owner = ' . $page_id));
if (!empty($albums)) {
	foreach ($albums as $i => $album) {
		// get all photos from each album
		$photos = $fb->api(array('method'=>'fql.query', 'query'=>'SELECT object_id, src_big FROM photo WHERE album_object_id = ' . $album['object_id']));
		if (!empty($photos)) {
			$total = count($photos);
			
			foreach ($photos as $j => $photo) {
				// download each photo
				$url = $photo['src_big'];
				$photo_data = file_get_contents($url);
				
				// Note that you need to create the "pics" directory
				// as the script does not handle the case where the directory is missing
				$dir_name = dirname(__FILE__) . '/pics/';
				$file_name = preg_replace('~.*/~', '', $url);
				
				if (!file_exists($dirname . $file_name)) file_put_contents($dir_name . $file_name, $photo_data);
				
				echo "$file_name saved successfully ($j of $total)\n";
			}
		}
	}
}
?>