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

        <?php if(count($produtos) > 0): ?>

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Peso Caixa</th>
                        <th>Desconto Rótulo</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($produtos as $produto): ?>

                        <tr>

                            <td><?= $produto->getId() ?></td>
                            <td><?= $produto->getNome() ?></td>
                            <td><?= $produto->getTipo() ?></td>
                            <td><?= $produto->getPesoCaixa() ?></td>
                            <td><?= $produto->getDescontoRotulo() ?></td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        <?php else: ?>

            <p>Nenhum produto cadastrado.</p>

        <?php endif; ?>

        <a class="voltar" href="cadastra.php">
            Cadastrar novo produto
        </a>

    </div>

</body>

</html>