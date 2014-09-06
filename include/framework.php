<?php

$config = ["data" => []];

function set_main_template($main) {
    global $config;
    $config["main template"] = $main;
}

function add_data($data) {
    global $config;
    foreach ($data as $key => $value) {
        $config["data"][$key] = $value;
    }
}

function data($name) {
    global $config;
    return $config["data"][$name];
}

function render($body) {
    global $config;
    ob_start();
    include $body;
    $body = ob_get_clean();
    include $config["main template"];
}

