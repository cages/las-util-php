<?php
/**
 * View routines
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */
declare(strict_types = 1);

function home()
{
    include '../templates/home.php';
}

function about()
{
    include '../templates/about.php';
}

function upload()
{
    include '../templates/upload.php';
}

function display_list()
{
    $las_db = get_db();
    $db_handle = $las_db['dbConn'];

    $statement = $db_handle->prepare(
        'SELECT DISTINCT filename FROM version;'
    );
    $result = $statement->execute();

    include '../templates/display-list.php';
}

function detail($query_string)
{
    $las_db = get_db();
    $db_handle = $las_db['dbConn'];

    $statement = $db_handle->prepare(
        'SELECT * FROM version WHERE filename = :filename;'
    );
    $statement->bindValue(':filename', $query_string);
    $result = $statement->execute();

    include '../templates/display-detail.php';
}

function restlist()
{
    $las_db = get_db();
    $db_handle = $las_db['dbConn'];
    $myfile = [];
    $mydata = [];

    $statement = $db_handle->prepare(
        'SELECT DISTINCT filename FROM version;'
    );
    $result = $statement->execute();

    // Build json array of key value pairs
    // [{filename: <filename>}, {...}, ...]
    while ($row = $result->fetchArray(1)) {
        $myfile['filename'] =  $row['filename'];
        $mydata[] = $myfile;
    }
    header('Content-Type: application/json');
    echo json_encode($mydata);
}

function restdetail($query_string)
{
    $las_db = get_db();
    $db_handle = $las_db['dbConn'];
    $mydata = [];

    $statement = $db_handle->prepare(
        'SELECT * FROM version WHERE filename = :filename;'
    );
    $statement->bindValue(':filename', $query_string);
    $result = $statement->execute();

    while ($row = $result->fetchArray(1)) {
        $mydata[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($mydata);
}
