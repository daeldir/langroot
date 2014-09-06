<?php

include_once "framework.php";
include_once "functions.php";

if (array_key_exists("word", $_GET)) {
        $word = standardize($_GET["word"]);
} else {
        $word = "";
}

function isActive($page) {
    global $config;
    if ($page == $config["data"]["current page"]) return " class=\"active\"";
    return "";
}

set_main_template("templates/main.php");
add_data([
    "title" => "",
    "word" => $word,
    "search" => "view.php"
]);

