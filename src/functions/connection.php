<?php

// PDO - PHP Data Object
$connection = new PDO(
  "mysql:dbname=controle_estoque;host=localhost",
  "root",
  "root"
);

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

