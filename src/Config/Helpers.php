<?php

/**
 * ---------------------
 * -------- URL --------
 * ---------------------
 */

use Src\Helpers\Session;

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
 * @param string $url
 */
function redirect(string $url): void
{
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }
    if (filter_input(INPUT_GET, "route", FILTER_DEFAULT) != $url) {
        $location = url($url);
        header("Location: {$location}");
        exit;
    }
}

function alert()
{
    $session = new Session();
    if ($flash = $session->flash()) {
        if ($flash->type === "success") {
            $str = "const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 3000,timerProgressBar: true,});";
            $str .= "Toast.fire({icon: 'success',title: '{$flash->message}'})";
        } else {
            $str = "Swal.fire({icon: '{$flash->type}',title: 'Ops...',text: '{$flash->message}',})";
            $str .= ".then((result) => {if (result.isConfirmed) { ";
            $str .= !empty($flash->url) ? "window.location.href = {$flash->url}" : "" . "}});";
        }
        return $str;
    }
    return null;
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
function date_str(string $date, string $format = "%d %b, %Y - %H:%M"): string
{
    return strftime($format, strtotime($date));
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
 * Transform string in URL
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

/**
 * Summarize text by words
 * @param string $string
 * @param integer $limit
 * @param string $pointer
 * @return string
 */
function str_words(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(
        filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS)
    );
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);

    if ($numWords < $limit) {
        return $string;
    }

    $words = implode(" ", array_slice($arrWords, 0, $limit));
    return "{$words}{$pointer}";
}

/**
 * Summarize text by chars
 * @param string $string
 * @param integer $limit
 * @param string $pointer
 * @return string
 */
function str_chars(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(
        filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS)
    );
    if (mb_strlen($string) <= $limit) {
        return $string;
    }

    $chars = mb_substr(
        $string,
        0,
        mb_strrpos(
            mb_substr($string, 0, $limit),
            " "
        )
    );
    return "{$chars}{$pointer}";
}
