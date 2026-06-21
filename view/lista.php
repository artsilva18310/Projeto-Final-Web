<?php

require_once __DIR__ . '/../controller/ProdutoController.php';

$controller = new ProdutoController();
$produtos = $controller->listar();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos cadastrados</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Produtos cadastrados</h2>

        <?php if (count($produtos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Peso Caixa</th>
                        <th>Desconto Rótulo</th>
                        <th>CEP</th>
                        <th>Cidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= htmlspecialchars((string) $produto->getId()) ?></td>
                            <td><?= htmlspecialchars($produto->getNome()) ?></td>
                            <td><?= htmlspecialchars($produto->getTipo()) ?></td>
                            <td><?= htmlspecialchars((string) $produto->getPesoCaixa()) ?></td>
                            <td><?= htmlspecialchars((string) $produto->getDescontoRotulo()) ?></td>
                            <td><?= htmlspecialchars($produto->getCep()) ?></td>
                            <td><?= htmlspecialchars($produto->getCidade()) ?></td>
                            <td>
                                <a href="edita_produto.php?id=<?= $produto->getId() ?>">Editar</a>
                                |
                                <form method="POST" action="deletar_produto.php" style="display:inline" onsubmit="return confirm('Confirma exclusão do produto?')">
                                    <input type="hidden" name="id" value="<?= $produto->getId() ?>">
                                    <button type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto cadastrado.</p>
        <?php endif; ?>

        <div class="links-acoes">
            <a href="cadastra.php">➕ Cadastrar novo produto</a>
            <a href="lista_lote.php">📦 Ver lotes</a>
            <a href="../index.php">🏠 Voltar ao início</a>
        </div>
    </div>
</body>
</html>