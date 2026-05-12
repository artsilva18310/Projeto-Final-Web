<?php

require_once __DIR__ . '/../controller/ProdutoController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $controller = new ProdutoController();

    $controller->salvar();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Cadastro de Produto</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <div class="container">

        <h2>Cadastro de Produto</h2>

        <form action="" method="POST">

            <label>Nome do produto</label>

            <input type="text" name="nome" required>

            <label>Tipo do produto</label>

            <input type="text" name="tipo" required>

            <label>Peso da caixa</label>

            <input type="number" step="0.01" name="peso_caixa" required>

            <label>Desconto/Peso rótulo</label>

            <input type="number" step="0.01" name="desconto_rotulo" required>

            <button type="submit">
                Cadastrar
            </button>

        </form>

        <a class="voltar" href="lista.php">Ver produtos cadastrados</a>
        
        <a class="voltar" href="../index.php">Voltar</a>

    </div>

</body>

</html>