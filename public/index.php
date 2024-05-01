<?php
require __DIR__ . '/../bootstrap.php';

// Esta url será o valor para navegação
$url = isset($_GET['url']) ? $_GET['url'] : '/';

if ($url === '/') {
    //include '../templates/list.php';
    require TEMPLATES . '/list.phtml';
}

if ($url === '/produto') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if ($id) {
        /* foreach(PRODUCTS as $currentProduct) {
            if($currentProduct['id'] == $id) {
                $product = $currentProduct;
                break;
            }
        } */

        $product = array_filter(PRODUCTS, function ($product) use ($id) {
            return $product['id'] == $id;
        });

        $product = current($product);
    }

    if (!$id || !$product) {
        die('O produto selecionado não existe');
    }

    $title = $product['name'];
    require TEMPLATES . '/show.phtml';
}

if ($url === '/produto/novo') {
    require TEMPLATES . '/create.phtml';
}

if ($url === '/produto/create') {
    print '<pre>';
    var_dump($_POST);
    var_dump($_FILES);
}
