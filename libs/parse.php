<?php

/**
* 
*/
class Parse
{

	public $html = '';

	public function getURLFilesFromPage($html)
	{
		$preg = '/.*(http:\/\/kaifolog\.ru\/.*.html).*/im';

		preg_match_all($preg, $html, $result );
		return $result[1];

	}

	public function getJpegImages($html)
	{
		preg_match_all('@.*<a href="(/uploads/posts/.*.jpg)" rel=.*@iU', $html, $matches);

		return $matches = $matches[1];
	}


	public function saveImageFile($url)
	{
		$ext = system::getFileExt($url);
		$fn = BASE_PATH.DIRECTORY_SEPARATOR.IMAGES_SOURCE.DIRECTORY_SEPARATOR.crc32($url).'.'.$ext;

		if ( ! file_exists($fn) ) {
			$image_data = file_get_contents($url);
			if ($image_data) {
				file_put_contents($fn, $image_data);
			}
		}
		return $fn;
	}


 

	function __construct()
	{


		for ($page = 12; $page < 374; $page++) { // 12 page

			$site = "http://kaifolog.ru/page/$page/";
			
			echo "<h1>$page</h1><br />";

			$k = 0;

			$html = $this->getURLFilesFromPage(system::file_get_contents_cached($site));

			var_dump($html);

			for ($i=0; $i < count($html); $i++) { 
				echo " [$i] <b>$html[$i]</b><br />";
				$images_page = system::file_get_contents_cached($html[$i]);
				$images = $this->getJpegImages($images_page);

				foreach ($images as $key => $value) {
					echo $k." ".$this->saveImageFile('http://kaifolog.ru/'.$value)."<br />";


					$k++;
				}
			}
		}

	}





}