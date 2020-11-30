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
    $fields = ['section', 'name', 'value', 'note'];

/* table top -----------------------------------*/
    $tabletop = <<<TABLETOP
<table class="doc-detail">

TABLETOP;

/* table section header -----------------------------------*/
    $section_header = <<<SECTION_HEADER
<thead>
<tr>
<th>SECTION</th>
<th>NAME</th>
<th>VALUE</th>
<th>NOTE</th>
</tr>
<tbody class="display-data">

SECTION_HEADER;

/* table end -----------------------------------*/
    $tableend = <<<TABLEEND
</tbody>
</table>

TABLEEND;

    $version_table = '';
    $well_table = '';
    $curve_table = '';
    $filename_header = '';


    $result->reset();
    while ($row = $result->fetchArray()) {
        $version_row = '';
        $well_row = '';
        $curve_row = '';
        if ($filename_header === '') {
            # $filename_header = '<tr><td colspan=4>';
            $filename_header = '<caption>';
            $filename_header = $filename_header .$row['filename'];
            # $filename_header = $filename_header . '</td></tr>' . "\n";
            $filename_header = $filename_header . '</caption>' . "\n";
        }

        foreach ($fields as $field) {
            if (substr($row['section'], 0, 2) === '~V') {
                $version_row = $version_row . '<td>'.$row[$field].'</td>' . "\n";
            } elseif (substr($row['section'], 0, 2) === '~W') {
                $well_row = $well_row . '<td>'.$row[$field].'</td>' . "\n";
            } elseif (substr($row['section'], 0, 2) === '~C') {
                $curve_row = $curve_row . '<td>'.$row[$field].'</td>' . "\n";
            }
        }

        if ($version_row !== '') {
            $version_table = $version_table . '<tr>' . $version_row .  '</tr>'. "\n";
        }
        if ($well_row !== '') {
            $well_table = $well_table . '<tr>' . $well_row .  '</tr>'. "\n";
        }
        if ($curve_row !== '') {
            $curve_table = $curve_table . '<tr>' . $curve_row .  '</tr>'. "\n";
        }
    }
    echo $tabletop;
    if ($filename_header !== '') {
        echo $filename_header;
    }
    echo $section_header;
    if ($version_table !== '') {
        echo $version_table;
    }
    if ($well_table !== '') {
        echo $well_table;
    }
    if ($curve_table !== '') {
        echo $curve_table;
    }
    echo $tableend;
}
?>
</div>
<?php include('footer.php'); ?>
</body>
</html>

