<?php
// View auxiliar para exclusão de funcionário.
// Recebe o POST com o ID e chama o controller para remover o item.

require_once __DIR__ . '/../controller/FuncionarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new FuncionarioController();
    $controller->excluir();
}

header('Location: lista_funcionario.php');
exit;
