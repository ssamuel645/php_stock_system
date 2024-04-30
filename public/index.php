<?php
require __DIR__ . '/../bootstrap.php';

// Esta url será o valor para navegação
$url = isset($_GET['url']) ? $_GET['url'] : '/';

if($url === '/') {
    //include '../templates/list.php';
    require TEMPLATES . '/list.php';
}

if($url === '/produto') {
    $id = isset($_GET['id']) ? $_GET['id'] :'';

    if($id) {
        foreach(PRODUCTS as $currentProduct) {
            if($currentProduct['id'] == $id) {
                $product = $currentProduct;
                break;
            }
        }
    }

    if(!$id || !isset($product)) {
        die('O produto selecionado não existe');
    }

    require TEMPLATES . '/show.php';
}
