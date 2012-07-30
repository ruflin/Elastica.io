<?php

/**
 * xBoilerplate: Xodoa Boilerplate
 *
 * @category xBoilerPlate
 * @package  Xodoa
 * @copyright Copyright (c) 2007-2012 Xodoa (http://xodoa.com)
 * @author   Nicolas Ruflin <ruflin@xodoa.com>
 */

ini_set('error_log', dirname(__DIR__) . '/tmp/test-error.log');

error_reporting(E_ALL|E_STRICT);

// adds elasticsearch to the include path
set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__) . '/../lib'));

function xodoa_autoload($class) {
	$file = str_replace('_', '/', $class) . '.php';
	require_once $file;
}

spl_autoload_register('xodoa_autoload');


