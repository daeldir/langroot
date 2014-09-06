<?php
include_once "include/app.php";
add_data([
    "current page" => "view",
    "title" => " - Mot : $word"
]);
render("templates/view.php");

