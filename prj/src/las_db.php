<?php
/**
 * LAS Database functions
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */
declare(strict_types = 1);


// Init data struct:
function las_db_init($file, $flags)
{
    $las_db = array(
        'dbConn' => null,
        'log_id' => null,
        'stdin'  => null,
        'flags'  => null,
        'db'     => dirname(__DIR__) . '/database/las.db'
    );

    // Save optional flags
    $las_db['flags'] = $flags;

    // Generate distinct id to tag all db entries for this file with.
    $las_db['log_id'] = hash_file('sha256', $file);

    // Open file handle
    // TODO: add error checking and fallback.
    if (file_exists("$file")) {
        // Open file
        $las_db['stdin'] = fopen("$file", 'r');
        // Create file specific id
        $las_db['log_id'] = hash_file('sha256', $file);
    } else {
        echo "FILE: [" . $file . "doesn't exist<br>";
    }


    return $las_db;
}


function las_check_for_db($las_db)
{
    // open database connection
    if (file_exists($las_db['db'])) {
        $las_db['dbConn'] = new SQLite3($las_db['db']);
    } else {
        // Create database
        $las_db['dbConn'] = new SQLite3($las_db['db'], SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE)
            or die($las_db['dbConn']->lastErrorMsg());


        // Create 'version' table
        $create_string = <<<'EOD'
CREATE TABLE IF NOT EXISTS "version" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "name" VARCHAR(10),
  "value" VARCHAR(100),
  "note" VARCHAR(100),
  "log_id" CHAR(65),
  UNIQUE (name, log_id) ON CONFLICT IGNORE
);
EOD;

        $las_db['dbConn']->exec($create_string) or die("Create table failed");
    }

    if (!$las_db['dbConn']) {
        echo $las_db['dbConn']->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }

    return $las_db;
}


function las_process_records($las_db)
{
    $flags        = $las_db['flags'];
    $db_handle    = $las_db['dbConn'];
    $stdin        = $las_db['stdin'];
    $field_log_id = $las_db['log_id'];

    $curr_las_header = null;

    /*
    // $tq = $db_handle->query("SELECT name FROM sqlite_master WHERE type='table';");
    $tq = $db_handle->query("SELECT name from sqlite_master;");

    while ($row = $tq->fetchArray(1)) {
        print_r($row);
        echo '<br>';
    }
    exit();
    */

    while (($line = fgets($stdin)) !== false) {
        $line = trim($line);
        if ($line[0] === '~') {
            $curr_las_header = $line;
            continue;
        }


        /** Version section delimiters
         *
         * There are 3 delimiters in the version section
         * - first dot
         * - first space after the dot
         * - last colon that is not part of a time string
         */

        // field_name precedes the first-dot
        list($field_name, $remaining_string) = explode(".", $line, 2);

        // optional unit field follows the first space after the dot
        list($field_unit, $remaining_string) = explode(' ', $remaining_string, 2);


        // value field precedes the last non-time colon
        // note field follows the last non-time colon
        preg_match('/^\s*(?<field_value>.*): (?<field_note>.*)$/', "$remaining_string", $matches);
        list(, $field_value, $field_note) = array_map("trim", $matches);

        $field_name = SQLite3::escapeString($field_name);
        $field_unit = SQLite3::escapeString($field_unit);
        $field_value = SQLite3::escapeString($field_value);
        $field_note = SQLite3::escapeString($field_note);

        if (array_key_exists('d', $flags)) {
            echo "Field_Name  : [$field_name]<br>";
            echo "Field_Unit  : [$field_unit]<br>";
            echo "Field_Value : [$field_value]<br>";
            echo "Field_Note  : [$field_note]<br>";
            echo "Field_Sha   : [$field_log_id]<br>";
            echo "<br>#---------------------------#<br>";
        }
        // Insert data into row/tuple
        $statement = $db_handle->prepare(
            'INSERT INTO version 
            ("name", "value", "note", "log_id")
            VALUES (:name, :value, :note, :log_id)'
        );
        $statement->bindValue(':name', $field_name);
        $statement->bindValue(':value', $field_value);
        $statement->bindValue(':note', $field_note);
        $statement->bindValue(':log_id', $field_log_id);
        $statement->execute();
    }
}
