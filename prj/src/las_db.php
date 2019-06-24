<?php
/*
File-Name: Db.php
File-Desc: parsing functions for las files
App-Name: Las-Util-Php
Project-Name: Las-Util-Php
Copyright: Copyright (c) 2019, DC Slagel
License-Identifier: MIT
*/


// Example:
function las_db_init($file, $flags)
{
    $las_db = array(
    'dbConn' => null,
    'log_id' => null,
    'stdin' => null,
    'flags' => null,
    'db' => 'database/las.db'
    );

    // Save optional flags
    $las_db['flags'] = $flags;

    // Generate distinct id to tag all db entries for this file with.
    $las_db['log_id'] = hash_file('sha256', $file);

    // Open file handle
    $las_db['stdin'] = fopen("$file", 'r');

    return $las_db;
}


function las_check_for_db($las_db)
{
    // open database connection
    if (file_exists($las_db['db'])) {
        $fail_msg = "Unable to open database: " . $las_db['db'] . "\n";
        // Connect to database
        $las_db['dbConn'] = new SQLite3($las_db['db'])
            or die($fail_msg);
    } else {
        // Create database
        $las_db['dbConn'] = new SQLite3($las_db['db'], SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE)
            or die($fail_msg);


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
    return $las_db;
}


function las_process_records($las_db)
{
    $flags = $las_db['flags'];
    $db_handle = $las_db['dbConn'];
    $stdin = $las_db['stdin'];

    while (($line = fgets($stdin)) !== false) {
        $line = trim($line);

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
        $field_name = SQLite3::escapeString($field_name);
        $field_name = SQLite3::escapeString($field_name);
        $field_name = SQLite3::escapeString($field_name);
        $field_name = SQLite3::escapeString($field_name);

        if (array_key_exists('d', $flags)) {
            print "Field_Name: [$field_name]\n";
            print "Field_Unit: [$field_unit]\n";
            print "Field_Value: [$field_value]\n";
            print "Field_Note: [$field_note]\n";
            print "Field_Sha: [$log_id]\n";
            print "\n#---------------------------#\n";
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
