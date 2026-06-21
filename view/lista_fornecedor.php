<?php
require_once __DIR__ . '/../controller/FornecedorController.php';

$controller = new FornecedorController();
$fornecedores = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Fornecedores cadastrados</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Fornecedores cadastrados</h2>

        <?php if (count($fornecedores) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fornecedores as $fornecedor): ?>
                        <tr>
                            <td><?= htmlspecialchars((string) $fornecedor->getId()) ?></td>
                            <td><?= htmlspecialchars($fornecedor->getNome()) ?></td>
                            <td><?= htmlspecialchars($fornecedor->getTelefone()) ?></td>
                            <td><?= htmlspecialchars($fornecedor->getEmail()) ?></td>
                            <td>
                                <a href="edita_fornecedor.php?id=<?= $fornecedor->getId() ?>">Editar</a>
                                |
                                <form method="POST" action="deletar_fornecedor.php" style="display:inline" onsubmit="return confirm('Confirma exclusão do fornecedor?')">
                                    <input type="hidden" name="id" value="<?= $fornecedor->getId() ?>">
                                    <button type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum fornecedor cadastrado.</p>
        <?php endif; ?>

        <div class="links-acoes">
            <a href="cadastra_fornecedor.php">Cadastrar novo fornecedor</a>
            <a href="../index.php">Voltar ao início</a>
        </div>
    </div>
</body>
</html>
