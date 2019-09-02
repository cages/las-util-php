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
require('is_file_to_upload.php');
?>

<!doctype html>
<html>
<head>
  <title>Las-Util</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSS File -->
  <link rel="stylesheet" href="stylesheets/style.css">
  <script type="text/javascript" src="verify-file.js"></script>
</head>

<body>
<!-- Validate Input --> 
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('process-file.php');
}
?>
<div class="page">
<!-- Header Section -->
    <?php include('header.php'); ?>

<!-- Body Section -->
    <div>
        <!-- Left-side column Menu Section -->
        <?php include('nav.php'); ?>

        <!-- Center Column Content Section -->
        <div>
            <h2>Upload Las File</h2>
            <form action="upload" method="post" enctype="multipart/form-data" onSubmit="return verified()">
            <div class="uploadform">
                <label for="fileToUpload">Log Ascii Standard file to upload</label>
                <div>
                    <input type="hidden" name="MAX_FILE_SIZE" value="16000000">
                    <input type="file" name="fileToUpload" id="fileToUpload"
                    placeholder="File Name" maxlength="50"
                    required value="<?php is_file_to_upload() ?>"/>
                </div>
                <div>
                    <div>
                        <input id="submit" type="submit" name="upload" value="Upload">
                    </div>
                </div>
            </div>
            </form>
        </div>
        
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>

