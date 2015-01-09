<?php

/**
* Imagerequest
*/
class ImageRequest
{
	
	protected $_URI = '';
	public $attributes = array();

	function __construct()
	{
		$this->getRequestImgInfo(system::getURI());
	}


	function getRequestImgInfo ($str) 
	{ 

		$attributes = array(
			'sizes' => '/(\d{1,})x(\d{1,})/i',
			'text' => '@.*text.*@i',
			'gray' => '@\/g{1}@im',
			'crop' => '@/c{1}@im'
			);

		$result = array();

		foreach ($attributes as $key => $value) {
			if ( preg_match($value, $str, $res) ) {
				unset($res[0]);
				$result[$key] = $res;		
			}
		}

		return $this->attributes = $result;
		
	}
}