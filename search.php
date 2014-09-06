<?php
include_once "functions.php";

echo json_encode(findWordsLike($_GET["term"]));
