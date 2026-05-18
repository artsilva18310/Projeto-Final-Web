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

        <?php if(count($produtos) > 0):  // verifica se há registros para exibir ?>
            

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

                            <td><?= $produto->getId() ?></td>  <!-- ID gerado pelo banco -->
                            <td><?= $produto->getNome() ?></td><!-- nome do time -->
                            <td><?= $produto->getTipo() ?></td><!-- ano de fundação -->
                            <td><?= $produto->getPesoCaixa() ?></td><!-- nome do estádio -->
                            <td><?= $produto->getDescontoRotulo() ?></td><!-- cor principal -->

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        <?php else: ?>

            <p>Nenhum produto cadastrado.</p>

        <?php endif; ?>

        <a class="voltar" href="cadastra.php">Cadastrar novo produto</a>
        
        <a class="voltar" href="../index.php">Voltar</a>

    </div>

</body>

</html>