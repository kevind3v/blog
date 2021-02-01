<?php

/** Constant Url Base of the project */

define("ROOT", "http://localhost/blog");

/** Constant for database configuration  */
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "blog",
    "username" => "root",
    "passwd" => "",
    "options" => [
        // PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
    ],
]);

/** Constant Date */
define("DATE", [
    "br" => "d/m/Y H:i:s",
    "app" => "Y-m-d H:i:s"
]);

/** Constant template */
define("BRPLATES", dirname(__DIR__, 2) . "/views");
