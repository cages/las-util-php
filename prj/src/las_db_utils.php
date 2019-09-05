<?php
/**
 * DB Utility routines
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */
declare(strict_types = 1);


function get_db()
{
    $las_db = [
        'db'     => dirname(__DIR__).'/database/las.db',
        'dbConn' => null,
        'flags'  => null,
        'stdin'  => null,
    ];

    if (file_exists($las_db['db'])) {
        $las_db['dbConn'] = new SQLite3($las_db['db']);
    }
    return $las_db;
}
