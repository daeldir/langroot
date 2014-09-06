<?php

include_once "functions.php";

$word = standardize($_GET["word"]);
$roots = rootsTextToArray($_GET["roots"]);

saveWord($word, $roots);

header("Location: ./edit.php?word=$word");
