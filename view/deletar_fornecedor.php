<?php
require_once __DIR__ . '/../controller/FornecedorController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new FornecedorController();
    $controller->excluir();
}

header('Location: lista_fornecedor.php');
exit;
