<?php
/**
 * Site config file
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */

// Add src to path
set_include_path(get_include_path()
. PATH_SEPARATOR . dirname(__DIR__) . '/src'
. PATH_SEPARATOR . dirname(__DIR__) . '/templates');

const DB_PATH = 'las.db';
