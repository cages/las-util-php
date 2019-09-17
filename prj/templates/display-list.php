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
  <title>Las-Util</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
</head>
<body>
<div class="page">
<?php include('header.php'); ?>
<?php include('nav.php'); ?>
<h2>LAS-Util Doc List</h2>
<?php
if ($result->fetchArray()[0] != null) {
    echo '<table class="doc-list">', "\n";
    echo '<tbody>', "\n";
    $result->reset();
    while ($row = $result->fetchArray(1)) {
        $filename = $row['filename'];
        echo '<tr>', "\n";
        echo '<td><a href=/detail?'.$filename.'>'.$filename.'</a></td>', "\n";
        echo '</tr>', "\n";
    }
    echo '</tbody>', "\n";
    echo '</table>', "\n";
}
?>
</div>
<?php include('footer.php'); ?>
</body>
</html>

