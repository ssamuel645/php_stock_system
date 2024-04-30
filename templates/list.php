<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Produtos</title>
</head>
<body>
    <?php foreach(PRODUCTS as $product): ?>
        <?php echo $product['name'] . ' - ' . $product['price']; ?>
        <a href="?url=/produto&id=<?php echo $product['id'] ?>">Detalhes</a>
        <br>
    <?php endforeach; ?>
</body>
</html>