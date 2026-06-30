<?php

require_once __DIR__ . '/../controller/ProdutoController.php';

$controller = new ProdutoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->excluir();
    exit;
}

header('Location: lista.php');

exit;
