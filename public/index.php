<?php

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die;
}

function d($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

require_once '../src/bootstrap.php';
