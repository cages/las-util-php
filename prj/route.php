<?php
/**
 * Main index page
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */

/**
 * Change to the project root so that all pathing is relative to it.
 */
require_once 'config/config.php';

$routes = array(
    '/'        => 'templates/home.php',
    '/about'   => 'src/about.php',
    '/upload'  => 'templates/upload.php',
    '/display' => 'templates/display-data.php',
);

// Grabs the URI and breaks in apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

$host = $_SERVER['HTTP_HOST'];

// Route it up!
if (array_key_exists($request_uri[0], $routes)) {
    require $routes[$request_uri[0]];
} else {
    // Home
    require 'templates/home.php';
}
# switch ($request_uri[0]) {
#     case '/':
#         require 'templates/home.php';
#         break;
#     case '/upload':
#         require 'templates/upload.php';
#         break;
#     case '/about':
#         require 'src/about.php';
#         break;
#     case '/display':
#         require 'templates/display-data.php';
#         break;
#     default:
#         require 'templates/home.php';
#         break;
# }
