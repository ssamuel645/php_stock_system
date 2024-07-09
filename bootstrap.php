<?php
require __DIR__ . "/src/functions/connection.php";

// Configurações do projeto
define('HOME', 'http://localhost:3030');
define('PROJECT', 'PHP Stock');
define('TEMPLATES', __DIR__ . '/templates');
define('PRODUCTS', require __DIR__ . '/src/products.php');
