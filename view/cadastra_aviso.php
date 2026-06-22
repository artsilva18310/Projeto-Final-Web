<?php
// View para cadastrar um aviso via MockAPI.
// O formulário envia os dados para a API configurada no ambiente.

require_once __DIR__ . '/../Database.php';
new Database();

$apiUrl = getenv('MOCKAPI_URL') ?: '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aviso</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastrar aviso</h2>

        <label>Título</label>
        <input type="text" id="titulo" required>

        <label>Mensagem</label>
        <textarea id="mensagem" rows="5" required></textarea>

        <label>Autor</label>
        <input type="text" id="autor" required>

        <button id="btn" type="button">Salvar aviso</button>

        <pre id="resposta"></pre>

        <div class="links-acoes">
            <a class="voltar" href="lista_aviso.php">Ver avisos</a>
            <a class="voltar" href="../index.php">Voltar ao início</a>
        </div>
    </div>

    <script>
        const apiUrl = <?= json_encode($apiUrl) ?>;
        const botao = document.getElementById('btn');
        const resposta = document.getElementById('resposta');

        botao.addEventListener('click', async function () {
            const titulo = document.getElementById('titulo').value.trim();
            const mensagem = document.getElementById('mensagem').value.trim();
            const autor = document.getElementById('autor').value.trim();

            if (!titulo || !mensagem || !autor) {
                resposta.textContent = 'Preencha todos os campos antes de enviar.';
                return;
            }

            if (!apiUrl) {
                resposta.textContent = 'Configure a variável MOCKAPI_URL no arquivo .env.';
                return;
            }

            try {
                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ titulo, mensagem, autor })
                });

                const data = await response.json();

                if (!response.ok) {
                    resposta.textContent = JSON.stringify({
                        status: response.status,
                        data
                    }, null, 2);
                    return;
                }

                resposta.textContent = JSON.stringify(data, null, 2);
            } catch (error) {
                resposta.textContent = 'Não foi possível enviar o aviso. Verifique a URL da API.';
            }
        });
    </script>
</body>
</html>
