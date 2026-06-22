<?php
// View auxiliar para exclusão de lote.
// Recebe o POST com o ID e chama o controller para remover o item.

require_once __DIR__ . '/../controller/LoteController.php';

$controller = new LoteController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->deletar();
    exit;
}

header('Location: lista_lote.php');
exit;
