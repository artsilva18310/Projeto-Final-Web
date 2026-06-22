<?php
// View para listar os funcionários cadastrados.
// Exibe os registros e permite editar ou excluir cada funcionário.

require_once __DIR__ . '/../controller/FuncionarioController.php';

$controller = new FuncionarioController();
$funcionarios = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Funcionários cadastrados</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Funcionários cadastrados</h2>

        <?php if (count($funcionarios) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Setor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($funcionarios as $funcionario): ?>
                        <tr>
                            <td><?= htmlspecialchars((string) $funcionario->getId()) ?></td>
                            <td><?= htmlspecialchars($funcionario->getNome()) ?></td>
                            <td><?= htmlspecialchars($funcionario->getCargo()) ?></td>
                            <td><?= htmlspecialchars($funcionario->getSetor()) ?></td>
                            <td>
                                <a href="edita_funcionario.php?id=<?= $funcionario->getId() ?>">Editar</a>
                                |
                                <form method="POST" action="deletar_funcionario.php" style="display:inline" onsubmit="return confirm('Confirma exclusão do funcionário?')">
                                    <input type="hidden" name="id" value="<?= $funcionario->getId() ?>">
                                    <button type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum funcionário cadastrado.</p>
        <?php endif; ?>

        <div class="links-acoes">
            <a href="cadastra_funcionario.php">Cadastrar novo funcionário</a>
            <a href="../index.php">Voltar ao início</a>
        </div>
    </div>
</body>
</html>
