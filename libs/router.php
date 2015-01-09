<?php


/**
* Router class
*/
class Router 
{

	function __construct()
	{
		if ( Preg_match('/parser=go/i', system::getURI()) ){
			new Parse();
		}
		$a = new ImageRequest();


		if (count($a->attributes) > 0) {
			$b = new ImageWorker($a->attributes);
		} else {
			include (BASE_PATH.DIRECTORY_SEPARATOR.VIEW.DIRECTORY_SEPARATOR.'home.php');
		}

	}
}