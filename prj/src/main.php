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
    require_once 'views.php';
    require_once 'las_db_utils.php';


    // ROUTE DEFINITIONS
    $routes = array(
        '/'           => 'home',
        '/about'      => 'about',
        '/list'       => 'display_list',
        '/detail'     => 'detail',
        '/upload'     => 'upload',
        '/api/list'   => 'restlist',
        '/api/detail' => 'restdetail',
    );

    // ROUTE ACTIONS
    // Grab the URI and break in parts in case we have querystring stuff
    $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

    /* DISPLAY HTTP DATA
    print_r($_SERVER);
    print_r($_POST);
    print_r($_GET);
    print_r($_FILES);
    or
    echo file_get_contents( 'php://input' );
     */

    // ------------------------------------------------------------------------
    // Redirect to either one of the registered routes or the default '/'.
    // ------------------------------------------------------------------------
    if (array_key_exists($request_uri[0], $routes)) {
        if (array_key_exists('QUERY_STRING', $_SERVER)) {
            $routes[$request_uri[0]]($_SERVER['QUERY_STRING']);
        } else {
            $routes[$request_uri[0]]();
        }
    } else {
        // Default route : Home
        header('location: /');
    }
}
