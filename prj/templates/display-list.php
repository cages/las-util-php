<?php
/**
 * Display Las Data
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */
?>

<!DOCTYPE html>
<html>
<head>
  <title>LAS-Util</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
</head>
<body>
<div class="page">
<?php include('header.php'); ?>
<?php include('nav.php'); ?>
<h2>LAS File List</h2>
<?php
if ($result->fetchArray()[0] != null) {
    echo '<div class="doc-list">', "\n";
    echo '<ul>', "\n";
    $result->reset();
    while ($row = $result->fetchArray(1)) {
        $filename = $row['filename'];
        echo '<li>', "\n";
        echo '<a href="/detail?'.$filename.'">'.$filename.'</a>', "\n";
        echo '</li>', "\n";
    }
    echo '</ul>', "\n";
    echo '</div>', "\n";
}
?>
</div>
<?php include('footer.php'); ?>
</body>
</html>

