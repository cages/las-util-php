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

function display_file_list()
{
    $las_db = get_db();
    $db_handle = $las_db['dbConn'];

    $statement = $db_handle->prepare(
        'SELECT DISTINCT filename FROM version;'
    );
    $result = $statement->execute();

    include '../templates/display-file-list.php';
}

function display_detail($query_string)
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
