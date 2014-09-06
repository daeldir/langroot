<?php
include_once "include/app.php"; 

function isCurrentWord($w) {
    global $word;
    if ($w == $word) return " class=\"info\"";
    return "";
}
if (array_key_exists("page", $_GET)) {
        $page = standardize($_GET["page"]);
} else {
        $page = 1;
}
if (array_key_exists("limit", $_GET)) {
        $limit = standardize($_GET["limit"]);
} else {
        $limit = 10;
}

$maxpages = getPagesForLimit($limit);

function pageActive($n) {
    global $page;
    if ($n == $page) return " class=\"active\"";
    return "";
}

function pageActiveSpan($n) {
    global $page;
    if ($n == $page) return " <span class=\"sr-only\">(current)</span>";
    return "";
}

function disableFirst() {
    global $page;
    if ($page == 1) return " class=\"disabled\"";
    return "";
}

function disableLast() {
    global $page, $maxpages;
    if ($page == $maxpages) return " class=\"disabled\"";
    return "";
}

add_data([
    "current page" => "all",
    "title" => " - Tout les mots",
    "page" => $page,
    "maxpages" => $maxpages,
    "limit" => $limit
]);

render("templates/all.php");

