<?php


class System{

	public static function file_get_contents_cached($url){

		if (file_exists($fn = BASE_PATH.DIRECTORY_SEPARATOR.CACHE.DIRECTORY_SEPARATOR.md5($url)))
		{
			return file_get_contents($fn);
		} else 
		{
			file_put_contents($fn, $html = file_get_contents($url));
			return $html;
		}
	}


	public static function getFileExt($url)
	{
		if ( strrpos($site, '/')+1 == strlen($site) ) {
			return 0;
		} else {
		    return $p = strtolower(substr($url, strrpos($url, '.', 1)+1));	
		}
	}

	public static function getURI()
	{
		return substr(getenv(REQUEST_URI), 1); 
	}


	public static function getRndJPEGFile(){
		$files = array();
		if ($handle = opendir($filepath = BASE_PATH.DIRECTORY_SEPARATOR.IMAGES_SOURCE)) {
		    while (false !== ($file = readdir($handle))) { 
		        if ($file != "." && $file != "..") { 
		            $files[] = $file; 
		        } 
		    }
		    closedir($handle); 
		}
		return $filename = $filepath.DIRECTORY_SEPARATOR.$files[rand(0, count($files)-1)];
	}

	public static function GenerateJPEGFileName($filename){

		return BASE_PATH.DIRECTORY_SEPARATOR.IMAGES_RESULT.DIRECTORY_SEPARATOR.crc32($filename);

	}



}