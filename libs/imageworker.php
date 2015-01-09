<?php


/**
* Image Worker
*/
class ImageWorker
{
	
	
	protected $_attr = array();

	function __construct( $attributes )
	{
		$this->_attr = $attributes; 
		$this->printImage();
		// $this->getRndJPEGFile();
	}

	public function printImage(){
		$filename = system::getRndJPEGFile();
		// var_dump($this->_attr);
		$width = $this->_attr['sizes'][1];
		$height = $this->_attr['sizes'][2];

		$crop = isset($this->_attr['crop']);
		$img = new acResizeImage($filename);

		if ( $crop ) {
			$c_x = rand(0, $img->width - $width);
			$c_y = rand(0, $img->height - $height);
			$img->crop($c_x, $c_y, $width, $height);

		} else {
			$img->resize($width, $height);
		}

		header('Content-type: image/jpeg');
		imagejpeg($img->image); 
		imagedestroy($img->image);

	}

}