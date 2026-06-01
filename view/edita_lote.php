<?php
require_once __DIR__ . '/../controller/LoteController.php';

$controller = new LoteController();

// Se veio POST, atualiza e redireciona
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    exit;
}

// GET: busca o lote pelo id passado na URL
$id   = $_GET['id'] ?? null;
$lote = $id ? $controller->buscarPorId($id) : null;

if (!$lote) {
    header("Location: lista_lote.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Lote</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="container">

        <h2>Editar Lote</h2>

        <form action="" method="POST">

            <input type="hidden" name="id"
                   value="<?= htmlspecialchars($lote->getId()) ?>">

            <label>Número do lote</label>

            <input type="text"
                   name="numero_lote"
                   value="<?= htmlspecialchars($lote->getNumeroLote()) ?>"
                   required>

            <label>Peso bruto</label>

            <input type="number"
                   step="0.01"
                   name="peso_bruto"
                   value="<?= htmlspecialchars($lote->getPesoBruto()) ?>"
                   required>

            <label>Peso líquido</label>

            <input type="number"
                   step="0.01"
                   name="peso_liquido"
                   value="<?= htmlspecialchars($lote->getPesoLiquido()) ?>"
                   required>

            <label>ID do produto</label>

            <input type="number"
                   name="id_produto"
                   value="<?= htmlspecialchars($lote->getIdProduto()) ?>"
                   required>

            <button type="submit">

                Salvar alterações

            </button>

        </form>

        <a class="voltar" href="lista_lote.php">

            Cancelar

        </a>

    </div>

</body>