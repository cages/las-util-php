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
// TODO: change index.php to require ../route.php
/**
 * Change to the project root so that all pathing is relative to it.
 */
chdir(dirname(__DIR__));
require_once dirname(__DIR__).'/config/config.php';

// Grabs the URI and breaks in apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

$host = $_SERVER['HTTP_HOST'];

// Route it up!
switch ($request_uri[0]) {
    case '/':
        require 'templates/home.php';
        break;
    case '/upload':
        require 'templates/upload.php';
        break;
    case '/uploadsuccess':
        require 'templates/upload-success.php';
        break;
    case '/uploadretry':
        require 'templates/upload-retry.php';
        break;
    case '/about':
        require 'src/about.php';
        break;
    case '/display':
        require 'templates/display-data.php';
        break;
}
