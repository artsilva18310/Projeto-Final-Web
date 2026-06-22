<?php
// View auxiliar para exclusão de produto.
// Recebe o POST com o ID e chama o controller para remover o registro.

require_once __DIR__ . '/../controller/ProdutoController.php';

$controller = new ProdutoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->deletar();
    exit;
}

header('Location: lista.php');
exit;
