<?php
include_once "include/app.php";
add_data([
    "current page" => "edit",
    "title" => " - Édition : $word",
    "search" => "edit.php"
]);
render("templates/edit.php");

