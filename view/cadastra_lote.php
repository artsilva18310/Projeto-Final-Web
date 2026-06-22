<?php
// View para cadastrar um novo lote.
// Também carrega a lista de produtos para o usuário selecionar o produto relacionado.

// Inclui os arquivos necessários
require_once __DIR__ . '/../controller/LoteController.php';
require_once __DIR__ . '/../controller/ProdutoController.php';
// Instancia o ProdutoController para obter a lista de produtos
$produtoController = new ProdutoController();
$produtos = $produtoController->listar();
// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new LoteController();
    $controller->salvar();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <title>Cadastro de Lote</title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <div class="container">

        <h2>Cadastro de Lote</h2>

        <form action="" method="POST">

            <label>Número do lote</label>
            <input type="text" name="numero_lote" required>

            <label>Peso bruto</label>
            <input type="number" step="0.01" name="peso_bruto" required>

            <label>Peso líquido</label>
            <input type="number" step="0.01" name="peso_liquido" required>

            <label>Produto</label>
            <select name="id_produto" required>
               
            // Exibe os produtos disponíveis para seleção
                <option value="">Selecione um produto</option>
                <?php foreach ($produtos as $produto): ?>
                    <option value="<?= $produto->getId() ?>">#<?= $produto->getId() ?> - <?= htmlspecialchars($produto->getNome()) ?></option>
                <?php endforeach; ?>
            </select>
          
                 
            <?php if (count($produtos) === 0): // Verifica se há produtos cadastrados para habilitar o cadastro de lotes?>
                <p class="erro">Cadastre ao menos um produto antes de criar lotes.</p>
            <?php endif; ?>

            <button type="submit" <?= count($produtos) === 0 ? 'disabled' : '' ?>>Cadastrar</button>

        </form>

   <div class="links-acoes">

    <a class="voltar" href="lista_lote.php">
         Ver lotes cadastrados
    </a>

    <a class="voltar" href="../index.php">
         Voltar ao início
    </a>

</div>
    </div>

</body>

</html>
