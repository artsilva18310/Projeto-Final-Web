<?php

require_once __DIR__ . '/../controller/LoteController.php';

$controller = new LoteController();
$lotes = $controller->listar();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <title>Lotes cadastrados</title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <div class="container">

        <h2>Lotes cadastrados</h2>

        <?php if (count($lotes) > 0): ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número do lote</th>
                        <th>Peso bruto</th>
                        <th>Peso líquido</th>
                        <th>ID produto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lotes as $lote): ?>
                        <tr>
                            <td><?= $lote->getId() ?></td>
                            <td><?= $lote->getNumeroLote() ?></td>
                            <td><?= $lote->getPesoBruto() ?></td>
                            <td><?= $lote->getPesoLiquido() ?></td>
                            <td><?= $lote->getIdProduto() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else: ?>

            <p>Nenhum lote cadastrado.</p>

        <?php endif; ?>

        <a class="voltar" href="cadastra_lote.php">Cadastrar novo lote</a>
        <a class="voltar" href="../index.php">Voltar</a>

    </div>

</body>

</html>
