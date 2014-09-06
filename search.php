<?php
include_once "include/functions.php";

echo json_encode(findWordsLike($_GET["term"]));
