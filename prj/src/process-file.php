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

// Debugging
// print_r($_FILES["fileToUpload"]);

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


// Move upload file from tmp location to projects upload dir.
$tmp_name = $_FILES["fileToUpload"]["tmp_name"];

// TODO: Clean file name


// Debugging
// print("<br>TMP-NAME: [" . $tmp_name . "]<br>");
//
$name = basename($_FILES["fileToUpload"]["name"]);
$from_path = UPLOAD_DIR . "/$name";

if (file_exists(UPLOAD_DIR . "/$name")) {
    echo "<p>$name already exists.<p>";
} else {
    $res = move_uploaded_file($tmp_name, "$from_path");

    if (! $res) {
        header('location: /uploadretry');
    }
    // TODO: pass file to parser-func
    // TODO: save file in db
}


