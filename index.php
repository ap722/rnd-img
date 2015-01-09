<?php

set_time_limit(0);


define(SYSTEM, 'libs');
define(CONTROLLER, 'controllers');
define(MODEL, 'model');
define(VIEW, 'view');
define(CACHE, 'cache');
define(IMAGES_SOURCE, 'source');
define(IMAGES_RESULT, 'results');

define(BASE_PATH, __DIR__);

function __autoload ($class) {
	$fn = __DIR__.DIRECTORY_SEPARATOR.SYSTEM.DIRECTORY_SEPARATOR. strtolower($class).'.php';
	require_once( $fn );
}


new Router();