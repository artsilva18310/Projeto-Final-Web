<?php

require_once __DIR__ . '/../controller/ProdutoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

            <label>CEP</label>
            <input type="text" id="cep" name="cep" maxlength="9" placeholder="Digite o CEP">

            <label>Rua</label>
            <input type="text" id="rua" name="rua" readonly>

            <label>Bairro</label>
            <input type="text" id="bairro" name="bairro" readonly>

            <label>Cidade</label>
            <input type="text" id="cidade" name="cidade" readonly>

            <button type="submit">Cadastrar</button>
        </form>

        <div class="links-acoes">
            <a class="voltar" href="lista.php">Ver produtos cadastrados</a>
            <a class="voltar" href="../index.php">Voltar ao início</a>
        </div>
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