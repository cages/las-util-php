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
declare(strict_types = 1);
session_start();

function is_file_to_upload()
{
    if (isset($POST['fileToUpload'])) {
        echo $_POST['fileToUpload'];
    }
}

function status_msg_for_upload()
{
    $message_text = "&nbsp";
    $upload_error = $_FILES['fileToUpload'][error];
    $upload_name = $_FILES['fileToUpload'][name];
    $data_link_name = ($_SESSION['fileToUpload']['new_name']);

    if (empty($upload_error) && !empty($upload_name)) {
        $message_text = "Success: " . $upload_name . " is uploaded";

        $message = '<div class="message">';
        $message .= '<a href="http://127.0.0.1:7000/detail?';
        $message .= $data_link_name;
        $message .= '">';
        $message .= $message_text;
        $message .= '</a></div>';
    } else if (!empty($upload_error)) {
        $message_text = 'Failed to upload file. Retry.';
        $message .= '<div class="message">'. $message_text . '</div>' . "\n";
    } else {
        $message .= '<div class="message">'. $message_text . '</div>' . "\n";
    }
    print($message);
}
