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
<h2>LAS-Util Detail Display</h2>
<?php
if ($result->fetchArray()[0] != null) {
    $fields = ['filename', 'section', 'name', 'value', 'note'];

    $tabletop = <<<TABLETOP
<table class="doc-detail">
<thead>
<tr>
<th>FILENAME</th>
<th>SECTION</th>
<th>NAME</th>
<th>VALUE</th>
<th>NOTE</th>
</tr>
<tbody class="display-data">

TABLETOP;

    $tableend = <<<TABLEEND
</tbody>
</table>

TABLEEND;

    echo $tabletop;

    $result->reset();
    while ($row = $result->fetchArray()) {
        echo '<tr>', "\n";
        foreach ($fields as $field) {
            echo '<td>'.$row[$field].'</td>', "\n";
        }
        echo '</tr>', "\n";
    }
    echo $tableend;
}
?>
</div>
<?php include('footer.php'); ?>
</body>
</html>

