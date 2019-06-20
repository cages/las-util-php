<?php
/**
 * Main index page
 *
 * @category
 * @package   Las-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   BSD-3-Clause
 */
?>

<!doctype html>
<html>
<head>
  <title>Las Util</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
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
        <div class="col-sm-8">
            <?php
            // Grabs the URI and breaks in apart in case we have querystring stuff
            $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

            $host = $_SERVER['HTTP_HOST'];
            // Route it up!
            switch ($request_uri[0]) {
                  // Upload page
                case '/upload':
                      require 'upload.php';
                    break;
                  // About page
                case '/about':
                      require 'about.php';
                    break;
                case '/receive':
                      require 'receive-file.php';
                    break;
                case '/display':
                      require 'display.php';
                    break;
            }
            ?>
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

