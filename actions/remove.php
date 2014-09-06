<?php

include_once "../include/functions.php";
$words_dir = "../words";

$word = standardize($_GET["word"]);

removeWord($word);

header("Location: ${_SERVER["HTTP_REFERER"]}");
