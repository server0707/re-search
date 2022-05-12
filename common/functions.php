<?php

function debug($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function debug_die($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}