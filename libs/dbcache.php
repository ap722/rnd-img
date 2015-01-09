<?php


class dbCache {


	function __construct(){

		require_once('rb.php');


		R::setup('mysql:host=localhost;dbname=mydatabase',
        'user','password');


	}


}