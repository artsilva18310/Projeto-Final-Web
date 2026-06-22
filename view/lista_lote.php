<?php
// View para listar os lotes cadastrados.
// Exibe os registros do banco e permite editar ou excluir cada item.

// Carrega o Controller para usar na View
require_once __DIR__ . '/../controller/LoteController.php';
// Instancia o Controller e chama o método para listar os lotes
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

        <?php if (count($lotes) > 0): // Exibe os lotes disponíveis ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número do lote</th>
                        <th>Peso bruto</th>
                        <th>Peso líquido</th>
                        <th>ID produto</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lotes as $lote): // Exibe os lotes disponíveis ?>
                        <tr>
                            <td><?= $lote->getId() ?></td>
                            <td><?= $lote->getNumeroLote() ?></td>
                            <td><?= $lote->getPesoBruto() ?></td>
                            <td><?= $lote->getPesoLiquido() ?></td>
                            <td><?= $lote->getIdProduto() ?></td>
                            <td>
                                <a href="edita_lote.php?id=<?= $lote->getId() ?>">Editar</a>
                                |
                                <form method="POST" action="deletar_lote.php" style="display:inline" onsubmit="return confirm('Confirma exclusão do lote?')">
                                    <input type="hidden" name="id" value="<?= $lote->getId() ?>">
                                    <button type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else: ?>

            <p>Nenhum lote cadastrado.</p>

        <?php endif; ?>

        
        <div class="links-acoes">

    <a class="voltar" href="cadastra_lote.php">
         Cadastrar novo lote
    </a>

    <a class="voltar" href="lista.php">
         Ver produtos cadastrados
    </a>

    <a class="voltar" href="../index.php">
         Voltar ao início
    </a>

</div>
    </div>

</body>

</html>
