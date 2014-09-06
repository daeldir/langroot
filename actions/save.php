<?php

include_once "../include/functions.php";
$words_dir = "../words";

$word = standardize($_GET["word"]);
$roots = rootsTextToArray($_GET["roots"]);

saveWord($word, $roots);

header("Location: ../edit.php?word=$word");
