<?php
require_once __DIR__ . '/../controller/FuncionarioController.php';

$controller = new FuncionarioController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->atualizar();
}

$funcionario = $controller->buscarPorId($_GET['id'] ?? null);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Editar Funcionário</h2>

        <?php if ($funcionario): ?>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars((string) $funcionario->getId()) ?>">

                <label>Nome</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($funcionario->getNome()) ?>" required>

                <label>Cargo</label>
                <input type="text" name="cargo" value="<?= htmlspecialchars($funcionario->getCargo()) ?>" required>

                <label>Setor</label>
                <input type="text" name="setor" value="<?= htmlspecialchars($funcionario->getSetor()) ?>" required>

                <button type="submit">Salvar alterações</button>
            </form>
        <?php else: ?>
            <p>Funcionário não encontrado.</p>
        <?php endif; ?>

        <div class="links-acoes">
            <a class="voltar" href="lista_funcionario.php">Voltar para a lista</a>
        </div>
    </div>
</body>
</html>
