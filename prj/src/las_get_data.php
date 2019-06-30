<?php
/**
 * Display Las Data
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */
declare(strict_types = 1);


function las_get_data()
{
    require_once '../src/las_db.php';

    if (!isset($las_db)) {
        $las_db = array(
            'dbConn' => null,
            'log_id' => null,
            'stdin'  => null,
            'flags'  => null,
            'db'     => dirname(__DIR__) . '/database/las.db'
        );
    }
    $las_db = las_query($las_db);
    las_close_db($las_db);
}
