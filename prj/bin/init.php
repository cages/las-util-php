<?php

init_dirs();

function init_dirs()
{
    $prj_dir = dirname(__DIR__);

    $dir = array(
        'db_dir' => $prj_dir . '/database',
        'up_dir' => $prj_dir . '/uploads'
    );

    foreach ($dir as $key => $value) {
        echo "Configuring directory:\n $value\n";
        if (! file_exists($value)) {
            echo  " - Doesn't exist: $value\n - Making directory $value\n";
            if (!mkdir($value)) {
                echo " Error: failed to create directory: $value\n";
                echo " Check the following for issues:\n";
                echo " - parent directory permissions\n";
                echo " - disk space\n";
            }
            chmod($value, 0750);
        } elseif (! is_dir($value)) {
            echo " Move the file $value\n";
            echo " then rerun init.php\n";
            echo " so that the directory $value can be created\n";
            exit(1);
        }
        echo "Configured directory:\n $value\n\n";
    }
}
