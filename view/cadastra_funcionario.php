<?php
require_once __DIR__ . '/../controller/FuncionarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new FuncionarioController();
    $controller->salvar();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro de Funcionário</h2>

        <form action="" method="POST">
            <label>Nome</label>
            <input type="text" name="nome" required>

            <label>Cargo</label>
            <input type="text" name="cargo" required>

            <label>Setor</label>
            <input type="text" name="setor" required>

            <button type="submit">Cadastrar</button>
        </form>

        <div class="links-acoes">
            <a class="voltar" href="lista_funcionario.php">Ver funcionários</a>
            <a class="voltar" href="../index.php">Voltar ao início</a>
        </div>
    </div>
</body>
</html>
