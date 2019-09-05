<?php
/**
 * Upload file utilities
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */
declare(strict_types = 1);


// Debugging
// print_r($_FILES["fileToUpload"]['name']);

// Upload and process wrapper function
function uu_upload_and_process_file()
{
    require '../src/las_db.php';

    // Upload processes
    $uu_data = uu_init_process();
    $uu_data = uu_get_file_loc($uu_data);

    // DB processes
    // $flags = array('d' => true);
    $flags = array();
    if (isset($uu_data['file_to_process']) && file_exists($uu_data['file_to_process'])) {
        $las_db = las_db_init($uu_data['file_to_process'], $flags);

        $las_db = las_check_for_db($las_db);
        $las_db = las_process_records($las_db);
    }
}


// Init data struct:
function uu_init_process() :array
{
    uu_check_file();

    $uu_data = array(
        'file_to_process' => null,
        'upload_dir' => dirname(__DIR__) . '/uploads'
    );
    return $uu_data;
}


function uu_check_file()
{
    // TODO: Check if there is a file, break if there isn't redirect with error msg

    if ($_FILES['fileToUpload']['size'] <= 0) {
        header('location: /');
    }

    // Check for upload errors.
    switch ($_FILES['fileToUpload']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }
}


function uu_get_file_loc(array $uu_data) : array
{
    // Move upload file from tmp location to projects upload dir.
    
    // tmp_name = from path
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];

    // TODO: Clean file name


    // Debugging
    // print("<br>TMP-NAME: [" . $tmp_name . "]<br>");

    // Build to_path
    $name = basename($_FILES["fileToUpload"]["name"]);
    $entry_date = (new DateTime())->format('Y-m-d-H-i-s');
    $path_parts = pathinfo($name);
    $name = $path_parts['filename'] . '-' . $entry_date . '.' . $path_parts['extension'];

    $to_path = $uu_data['upload_dir'] . "/$name";

    if (file_exists($to_path)) {
        // TODO: pass this message to next view
        echo "<p>$name already exists.<p>";
        return $uu_data;
    } else {
        $res = move_uploaded_file("$tmp_name", "$to_path");

        if (! $res) {
            header('location: /uploadretry');
        }
        $uu_data['file_to_process'] = $to_path;
        return $uu_data;
    }
}
