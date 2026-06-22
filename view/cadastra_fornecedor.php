<?php
// View para cadastrar um novo fornecedor.
// Ao enviar o formulário, o controller salva os dados no banco.

require_once __DIR__ . '/../controller/FornecedorController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new FornecedorController();
    $controller->salvar();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Fornecedor</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro de Fornecedor</h2>

        <form action="" method="POST">
            <label>Nome</label>
            <input type="text" name="nome" required>

            <label>Telefone</label>
            <input type="text" name="telefone" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <button type="submit">Cadastrar</button>
        </form>

        <div class="links-acoes">
            <a class="voltar" href="lista_fornecedor.php">Ver fornecedores</a>
            <a class="voltar" href="../index.php">Voltar ao início</a>
        </div>
    </div>
</body>
</html>
