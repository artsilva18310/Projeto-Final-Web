<?php
// View para listar os produtos cadastrados.
// Também recebe a ação de exclusão quando o usuário confirma a remoção.

require_once __DIR__ . '/../controller/ProdutoController.php';

$controller = new ProdutoController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['acao']) && $_POST['acao'] == 'excluir') {
    $controller->excluir();
    exit;
}

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

        <?php if (isset($_GET['erro']) && $_GET['erro'] == 'produto_com_lote'): ?>
            <p style="color: red; font-weight: bold;">
                Não é possível excluir este produto, pois existem lotes vinculados a ele.
            </p>
        <?php endif; ?>

        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'excluido'): ?>
            <p style="color: green; font-weight: bold;">
                Produto excluído com sucesso.
            </p>
        <?php endif; ?>

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
                                <form method="POST" action="" style="display:inline" onsubmit="return confirm('Confirma exclusão do produto?')">
                                    <input type="hidden" name="acao" value="excluir">
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
            <a href="cadastra.php"> Cadastrar novo produto</a>
            <a href="lista_lote.php"> Ver lotes</a>
            <a href="../index.php"> Voltar ao início</a>
        </div>
    </div>
</body>
</html>