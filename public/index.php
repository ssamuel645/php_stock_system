<?php
require __DIR__ . '/../bootstrap.php';

// Esta url será o valor para navegação
$url = isset($_GET['url']) ? $_GET['url'] : '/';

if ($url === '/') {
    //include '../templates/list.php';
    require TEMPLATES . '/list.phtml';
}

if ($url === '/produto') {
    $id = $_GET['id'] ?? '';

    if ($id) {
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

    $formData = $_POST;
    $formData['price'] = str_replace(['.', ','], ['', '.'], $formData['price']);
    
    $sql = "INSERT INTO produtos
  (nome, descricao, preco, status, criado_em, atualizado_em) VALUES
  (:nome, :descricao, :preco, :status, NOW(), NOW())";

    $insert = $connection->prepare($sql);
    $insert->bindValue(":nome", $formData['name'], PDO::PARAM_STR);
    $insert->bindValue(":descricao", $formData['description'], PDO::PARAM_STR);
    $insert->bindValue(":preco", $formData['price'], PDO::PARAM_STR);
    $insert->bindValue(":status", $formData['status'], PDO::PARAM_INT);

    $insert->execute();
    
    echo $connection->lastInsertId(); // Retorna o último id inserido no banco
}
