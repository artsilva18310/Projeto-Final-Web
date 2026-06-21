<?php
require_once __DIR__ . '/../controller/ProdutoController.php';

$controller = new ProdutoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->atualizar();
    exit;
}

$id = $_GET['id'] ?? null;
$produto = $id ? $controller->buscarPorId($id) : null;

if (!$produto) {
    header('Location: lista.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Editar Produto</h2>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars((string) $produto->getId()) ?>">

            <label>Nome</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($produto->getNome()) ?>" required>

            <label>Tipo</label>
            <input type="text" name="tipo" value="<?= htmlspecialchars($produto->getTipo()) ?>" required>

            <label>Peso caixa</label>
            <input type="number" step="0.01" name="peso_caixa" value="<?= htmlspecialchars((string) $produto->getPesoCaixa()) ?>" required>

            <label>Desconto rótulo</label>
            <input type="number" step="0.01" name="desconto_rotulo" value="<?= htmlspecialchars((string) $produto->getDescontoRotulo()) ?>" required>

            <label>CEP</label>
            <input type="text" id="cep" name="cep" maxlength="9" value="<?= htmlspecialchars($produto->getCep()) ?>">

            <label>Rua</label>
            <input type="text" id="rua" name="rua" value="<?= htmlspecialchars($produto->getRua()) ?>">

            <label>Bairro</label>
            <input type="text" id="bairro" name="bairro" value="<?= htmlspecialchars($produto->getBairro()) ?>">

            <label>Cidade</label>
            <input type="text" id="cidade" name="cidade" value="<?= htmlspecialchars($produto->getCidade()) ?>">

            <button type="submit">Salvar alterações</button>
        </form>

        <a class="voltar" href="lista.php">Cancelar</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cepInput = document.getElementById('cep');
            const ruaInput = document.getElementById('rua');
            const bairroInput = document.getElementById('bairro');
            const cidadeInput = document.getElementById('cidade');

            cepInput.addEventListener('blur', async function () {
                const cep = this.value.replace(/\D/g, '');

                if (cep.length !== 8) {
                    return;
                }

                try {
                    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                    const data = await response.json();

                    if (data.erro) {
                        alert('CEP não encontrado.');
                        return;
                    }

                    ruaInput.value = data.logradouro || '';
                    bairroInput.value = data.bairro || '';
                    cidadeInput.value = data.localidade || '';
                } catch (error) {
                    alert('Não foi possível buscar o CEP.');
                }
            });
        });
    </script>
</body>
</html>