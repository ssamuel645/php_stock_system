<?php

// Esta url será o valor para navegação
$url = isset($_GET['url']) ? $_GET['url'] : '/';

if($url === '/') {
    //include '../templates/list.php';
    require '../templates/list.php';
}

if($url === '/produto') {
    require '../templates/show.php';
}

/* if($url == '/') {
    echo 'Página Inicial';
} */