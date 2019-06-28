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
declare(strict_types = 1);


function main()
{
    require_once '../config/config.php';

    $routes = array(
        '/'        => '../templates/home.php',
        '/about'   => '../templates/about.php',
        '/upload'  => '../templates/upload.php',
        '/display' => '../templates/display-data.php',
    );

    // Grabs the URI and breaks in apart in case we have querystring stuff
    $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);


    // Route it up!
    if (array_key_exists($request_uri[0], $routes)) {
        require $routes[$request_uri[0]];
    } else {
        // Default route : Home
        require '../templates/home.php';
    }
}
