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
 * @return string
 */
function url_back(): string
{
    return ($_SERVER['HTTP_REFERER'] ?? url());
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

/**
 * ------------------
 * ----- DATE -----
 * ------------------
 */

/**
 * Date Format
 * @param string $date
 * @param string $format
 * @return string
 */
function date_fmt(string $date = "now", string $format = "d/m/Y H\hi"): string
{
    return (new DateTime($date, new DateTimeZone("America/Sao_Paulo")))->format($format);
}

/**
 * Data Br
 * @param string $date
 * @return string
 */
function date_fmt_br(string $date): string
{
    return (new DateTime($date))->format(DATE['br']);
}

/**
 * Date for string
 * @param string $date
 * @return string
 */
function date_str(string $date): string
{
    return strftime("%d %b, %Y - %H:%M", strtotime($date));
}

/**
 * Date APP
 * @param string $date
 * @return string
 */
function date_fmt_app(string $date): string
{
    return (new DateTime($date))->format(DATE['app']);
}

/**
 * ------------------
 * ----- STRING -----
 * ------------------
 */

/**
 *
 * Transformar uma string em url
 * @param string $string
 * @return string
 */
function str_slug(string $string): string
{
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

    //Substituir espaços em traços
    $slug = str_replace(
        ["-----", "----", "---", "--"],
        "-",
        str_replace(
            " ",
            "-",
            trim(strtr(utf8_decode($string), utf8_decode($formats), $replace))
        )
    );
    return $slug;
}
