<?php
/**
 * Receive uploaded file receive-file.php
 *
 * @category
 * @package   Las-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   BSD-3-Clause
 */

$upload_dir = "uploads";

/*
 * Array (
 * [name] => version.las
 * [type] => application/octet-stream
 * [tmp_name] => /private/var/folders/wg/0nrwp1vx2xs33kcghzhbdw6c0000gp/T/phpXWUP34
 * [error] => 0
 * [size] => 672 )
 * Warning: Invalid argument supplied for foreach() in
 * /usr/local/devel/ProgLangs/php-lang/my-projects/parsers/parser-las-php/src/processfile.php
 * on line 5
 */

// Debugging
// print_r($_FILES["fileToUpload"]);

// TODO: Check if there is a file, break if there isn't
// redirect with error msg
if ($_FILES['fileToUpload']['size'] <= 0) {
    header('/');
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
if (file_exists("$upload_dir/$name")) {
    echo "<p>$upload_dir/$name already exists.<p>";
} else {
    $res = move_uploaded_file($tmp_name, "$upload_dir/$name");

    /*
    if($res == true){
    echo "<script language='javascript'>\n";
    echo "alert('Upload successful!'); window.location.href='index.html';";
    echo "</script>\n";
    }
    */
    if ($res) {
        ?>
<html>
<head>
  <title>Las Util</title>
</head>
<body>
  <div style="display:block;padding:40px;margin:40px;border:1px solid #ccc">
        <p><?php print("$name is successfully uploaded")?></p>
    <form action="receive-file.php" method="post"  enctype="multipart/form-data">
      <p>
        Log Ascii Standard file to upload: 
        <input type="hidden" name="MAX_FILE_SIZE" value="16000000">
        <input type="file" name="fileToUpload" id="fileToUpload" />
      </p>
      <p><input type="submit" value="Upload" /></p>
    </form>
  </div>
</body>
</html>

        <?php
    }
}
