<?php
require_once __DIR__ . '/../controller/LoteController.php';

$controller = new LoteController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->deletar();
    exit;
}

header('Location: lista_lote.php');
exit;
