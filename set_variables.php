<?php 
if (array_key_exists("word", $_GET)) {
    $word = standardize($_GET["word"]);
} else {
    $word = "";
}

switch(basename($_SERVER["SCRIPT_NAME"])) {
case "all.php":
    $currentPage = "all";
    $title = " - Tout les mots";
    $search = "view.php";
    break;
case "edit.php":  
    $currentPage = "edit";
    $title = " - Édition : $word";
    $search = "edit.php";
    break;
case "index.php": 
    $currentPage = "index";
    $title = "";
    $search = "view.php";
    break;
case "view.php":  
    $currentPage = "view";
    $title = " - Mot : $word";
    $search = "view.php";
    break;
default:
    die("unknown page: ${_SERVER["SCRIPT_NAME"]}");
}

