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

/**
 * ------------------
 * ----- UPLOAD -----
 * ------------------
 */

/**
 * Treat base64 image
 *
 * @param string $image
 * @return string|null
 */
function image(string $image, string $old = null): ?string
{
    if (!empty($image) && preg_match("/data:image\\/png;base64,/", $image)) {
        $first_array = explode(";", $image);
        $array = explode(",", $first_array[1]);
        if ($data = base64_decode($array[1], true)) {
            if ($old) {
                removeImage($old);
            }
            $name = time() . '.png';
            if (file_put_contents('uploads/' . $name, $data)) {
                return $name;
            }
        }
    }
    return null;
}

/**
 * Remove directory image
 * @param string $image
 * @return boolean
 */
function removeImage(string $image): void
{
    if (file_exists("uploads/{$image}")) {
        unlink("uploads/{$image}");
    }
}
