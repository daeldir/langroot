<?php

include_once "functions.php";

$word = standardize($_GET["word"]);

removeWord($word);

header("Location: ${_SERVER["HTTP_REFERER"]}");
