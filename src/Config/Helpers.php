<?php

/**
 * ---------------------
 * -------- URL --------
 * ---------------------
 */

/**
 * @param string $path
 * @return string
 */
function url(string $path = "/"): string
{
    return ROOT . "/" . path($path);
}

/**
 * @param string $path
 * @return string
 */
function path(string $path): string
{
    return ($path[0] == "/" ? mb_substr($path, 1) : $path);
}

/**
 * --------------------
 * ------ ASSETS ------
 * --------------------
 */

/**
 * @param string $path
 * @return string
 */
function asset(string $path): string
{
    return url("views/assets/") . path($path);
}

/**
 * @param string $path
 * @return string
 */
function package(string $path): string
{
    return url("node_modules/") . path($path);
}
