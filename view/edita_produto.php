<?php
require_once __DIR__ . '/../controller/ProdutoController.php';

$controller = new ProdutoController();

// Se veio POST, atualiza e redireciona
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    exit;
}

// GET: busca o produto pelo id passado na URL
$id      = $_GET['id'] ?? null;
$produto = $id ? $controller->buscarPorId($id) : null;

if (!$produto) {
    header("Location: lista.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="container">

        <h2>Editar Produto</h2>

        <form action="" method="POST">

            <input type="hidden" name="id" value="<?= htmlspecialchars($produto->getId()) ?>">

            <label>Nome</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($produto->getNome()) ?>" required>

            <label>Tipo</label>
            <input type="text" name="tipo" value="<?= htmlspecialchars($produto->getTipo()) ?>" required>

            <label>Peso caixa</label>
            <input type="number" step="0.01" name="peso_caixa" value="<?= htmlspecialchars($produto->getPesoCaixa()) ?>" required>

            <label>Desconto rótulo</label>
            <input type="number" step="0.01" name="desconto_rotulo" value="<?= htmlspecialchars($produto->getDescontoRotulo()) ?>" required>

            <button type="submit">Salvar alterações</button>

        </form>

        <a class="voltar" href="lista.php">Cancelar</a>

    </div>

</body>