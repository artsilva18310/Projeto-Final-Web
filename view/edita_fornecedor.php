<?php
// View para editar um fornecedor.
// Busca o item pelo ID e preenche os campos com os dados atuais.

require_once __DIR__ . '/../controller/FornecedorController.php';

$controller = new FornecedorController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->atualizar();
}

$fornecedor = $controller->buscarPorId($_GET['id'] ?? null);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Fornecedor</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Editar Fornecedor</h2>

        <?php if ($fornecedor): ?>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars((string) $fornecedor->getId()) ?>">

                <label>Nome</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($fornecedor->getNome()) ?>" required>

                <label>Telefone</label>
                <input type="text" name="telefone" value="<?= htmlspecialchars($fornecedor->getTelefone()) ?>" required>

                <label>Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($fornecedor->getEmail()) ?>" required>

                <button type="submit">Salvar alterações</button>
            </form>
        <?php else: ?>
            <p>Fornecedor não encontrado.</p>
        <?php endif; ?>

        <div class="links-acoes">
            <a class="voltar" href="lista_fornecedor.php">Voltar para a lista</a>
        </div>
    </div>
</body>
</html>
