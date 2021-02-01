<?php

/** Minify */

use MatthiasMullie\Minify\JS;
use MatthiasMullie\Minify\CSS;

if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
    //CSS
    $minCSS = new CSS();

    //Theme CSS
    $cssDir = scandir(dirname(__DIR__, 2) . "/views/assets/css");

    foreach ($cssDir as $css) {
        $cssFile = dirname(__DIR__, 2) . "/views/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minCSS->add($cssFile);
        }
    }

    //JS
    $minJS = new JS();

    //Theme JS
    $jsDir = scandir(dirname(__DIR__, 2) . "/views/assets/js");

    foreach ($jsDir as $js) {
        $jsFile = dirname(__DIR__, 2) . "/views/assets/js/{$js}";
        //Verificar se é um arquivo css
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minJS->add($jsFile);
        }
    }

    //Minify
    $minCSS->minify(dirname(__DIR__, 2) . "/views/assets/style.min.css");
    $minJS->minify(dirname(__DIR__, 2) . "/views/assets/scripts.min.js");
}
