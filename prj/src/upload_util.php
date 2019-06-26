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

// Debugging
// print_r($_FILES["fileToUpload"]);

// Init data struct:
function uu_init_process()
{
    uu_check_file();

    $uu_data = array(
        'file_to_process' => null,
        'upload_dir' => dirname(__DIR__) . '/uploads'
    );
    return $uu_data;
}

// TODO: pass file to parser-func
// TODO: save file in db

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

function uu_get_file_loc($uu_data)
{
    // Move upload file from tmp location to projects upload dir.
    
    // tmp_name = from path
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];

    // TODO: Clean file name


    // Debugging
    // print("<br>TMP-NAME: [" . $tmp_name . "]<br>");

    // Build to_path
    $name = basename($_FILES["fileToUpload"]["name"]);
    $to_path = $uu_data['upload_dir'] . "/$name";

    if (file_exists($to_path)) {
        echo "<p>$name already exists.<p>";
        return "";
    } else {
        $res = move_uploaded_file("$tmp_name", "$to_path");

        if (! $res) {
            header('location: /uploadretry');
        }
        $uu_data['file_to_process'] = $to_path;
        return $uu_data;
    }
}
