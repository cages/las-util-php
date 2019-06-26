<?php
/**
 * Receive uploaded file
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */

function is_file_to_upload()
{
    if (isset($POST['fileToUpload'])) {
        echo $_POST['fileToUpload'];
    }
}
?>
