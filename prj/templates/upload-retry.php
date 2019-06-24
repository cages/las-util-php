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
?>

<!doctype html>
<html>
<head>
  <title>Las Util</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <script type="text/javascript" src="verify-file.js"></script>
</head>

<body>
<div class="container" style="margin-top:30px">
<!-- Header Section -->
<header class="jumbotron text-center row" style="margin-bottom:2px; background:pale; padding:20px;">
    <?php include('header-for-template.php'); ?>
</header>

<!-- Body Section -->
    <div class="row" style="padding-left: 0px">
        <!-- Left-side column Menu Section -->
        <?php include('nav.php'); ?>

        <!-- Center Column Content Section -->
        <!-- Validate Input --> 
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require('process-file.php');
        }
        ?>
        <div class="col-sm-8">
            <h2 class="h2 test-center">Upload Las File</h2>
            <form action="upload" method="post" enctype="multipart/form-data" onSubmit="return verified()">
            <div class="form-group row">
                <label for="fileToUpload" class="col-sm-4 col-form-label">Log Ascii Standard file to upload</label>
                <div class="col-sm-8">
                    <input type="hidden" name="MAX_FILE_SIZE" value="16000000">
                    <input type="file" class=form-control" name="fileToUpload" id="fileToUpload"
                    placeholder="File Name" maxlength="50"
                    required value="<?php if (isset($POST['fileToUpload'])) echo $_POST['fileToUpload']; ?>"/>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="submit" class="btn btn-primary" type="submit" name="upload" value="Upload">
                    </div>
                </div>
            </div>
            </form>
        </div>
        
        <!-- Right-side Column Content Section -->
        <aside class="col-sm-2">
            <?php include('info-col.php'); ?>
        </aside>
    </div>
    <footer class="jumbotron text-center row" style="padding-bottom:1px; padding-top:8px;">
        <?php include('footer.php'); ?>
    </footer>
</div>
</body>
</html>

