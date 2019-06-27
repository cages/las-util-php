<?php
/**
 * Process uploaded file
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */
declare(strict_types = 1);

require '../src/las_db.php';
require '../src/upload_util.php';


/*
 * ----------------------------------------------
 * Upload processes
 * ----------------------------------------------
 */
$uu_data = uu_init_process();
$uu_data = uu_get_file_loc($uu_data);

/*
 * ----------------------------------------------
 * DB processes
 * ----------------------------------------------
 */

// $flags = array('d' => true);

if (isset($uu_data['file_to_process']) && file_exists($uu_data['file_to_process'])) {
    $las_db = las_db_init($uu_data['file_to_process'], $flags);

    $las_db = las_check_for_db($las_db);
    las_process_records($las_db);
}
