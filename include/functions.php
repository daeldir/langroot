<?php

$words_dir = "./words";

function standardize($word) {
    return trim(preg_replace("/[^a-zA-Z0-9_\-]/", "", $word));
}

function listWords() {
    global $words_dir;
    if (!file_exists($words_dir)) mkdir($words_dir);
    $dir = opendir($words_dir);
    $files = [];
    while($filename = readdir($dir)) {
        if ($filename == "." or $filename == "..") continue;
        array_push($files, standardize($filename));
    }
    closedir($dir);
    asort($files);
    return $files;
}

function getPagesForLimit($limit) {
    $c = count(listWords());
    if ($c % $limit != 0) return floor($c/$limit) + 1;
    return floor($c/$limit);
}

function limitedListWords($limit, $page) {
    $files = listWords();
    $page = $page-1;
    return array_slice($files, $page * $limit, $limit);
}

function rootsTextToArray($text) {
    $roots = [];
    foreach (preg_split("/\s+/", $text) as $base) {
        // We remove the “eof” at the end of the last word :-S
        array_push($roots, standardize($base)); 
    }
    asort($roots);
    return $roots;
}

function saveWord($word, $roots) {
    global $words_dir;
    $word = standardize($word);
    file_put_contents("$words_dir/$word", rootsAsText($roots));
    generateWords();
}

function removeWord($word) {
    global $words_dir;
    $word = standardize($word);
    unlink("$words_dir/$word");
    generateWords();
}

function listRoots($word) {
    global $words_dir;
    $word = standardize($word);
    if (file_exists("$words_dir/$word")) {
        $file = file_get_contents("$words_dir/$word");
        return rootsTextToArray($file);
    } else {
        return [];
    }
}

function generateWords() {
    global $words_dir;
    foreach(listWords() as $word) {
        $word = standardize($word);
        foreach(listRoots($word) as $root) {
            $root = standardize($root);
            if (!file_exists("$words_dir/$root")) {
                touch("$words_dir/$root");
            }
        }
    }
}

function rootsAsText($roots) {
    $text = "";
    foreach ($roots as $root) {
        $text .= standardize($root)." ";
    }
    return trim($text);
}

function explodeWord($word) {
    $original = standardize($word);
    $wordsDone = [];
    $wordsToDo = listRoots($word);
    while (count($wordsToDo) > 0) {
        $word = array_pop($wordsToDo);
        $word = standardize($word);
        if (trim($word) == "") continue; // Don't know where they come from.
        if (in_array($word, $wordsDone)) continue;
        if ($word == $original) continue;
        $wordsToDo = array_merge($wordsToDo, listRoots($word));
        array_push($wordsDone, $word);
    }
    asort($wordsDone);
    return $wordsDone;
}

function findWordsLike($input) {
    $input = standardize($input);
    $res = [];
    foreach (listWords() as $word) {
            if (strpos($word, $input) !== FALSE) array_push($res, $word);
    }
    return $res;
}

