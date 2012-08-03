<?php

/**
 * xBoilerplate: Xodoa Boilerplate
 *
 * @category xBoilerPlate
 * @package  Xodoa
 * @copyright Copyright (c) 2007-2012 Xodoa (http://xodoa.com)
 * @author   Nicolas Ruflin <ruflin@xodoa.com>
 */

ini_set('error_log', dirname(__DIR__) . '/tmp/error.log');

error_reporting(E_ALL|E_STRICT);

// adds elasticsearch to the include path
set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__) . '/../lib'));

include('../autoload.php');

$content = '';
try {

    if ($_SERVER['REDIRECT_URL']){
        $uri = parse_url($_SERVER['REDIRECT_URL']);
    } else {
        $uri = parse_url($_SERVER['REQUEST_URI']);
    }

    $xBoilerplate = xBoilerplate::getInstance()->pageStart($uri['path'], $_GET, __DIR__);

    if (substr($uri['path'], 1,3) == 'css') {
        // Load css
        header('Content-Type: text/css');
        $cssContent = $xBoilerplate->loadCss(substr($uri['path'], 5));

        $less = new lessc();
        $content = $less->parse($cssContent);
    } else if (substr($uri['path'], 1,2) == 'js') {
        // load js
        header('Content-Type: text/javascript');
        $content = $xBoilerplate->loadJs(substr($uri['path'], 4));
    } else {
        $content = $xBoilerplate->render();
    }
} catch(Exception $e) {
    error_log(print_r($e, true));
}

echo $content;

