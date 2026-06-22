<?php
// View para listar os avisos vindos da MockAPI.
// O conteúdo é carregado dinamicamente pela página usando JavaScript.

require_once __DIR__ . '/../Database.php';
new Database();

$apiUrl = getenv('MOCKAPI_URL') ?: '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Avisos cadastrados</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Avisos cadastrados</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Mensagem</th>
                    <th>Autor</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody id="lista-avisos">
                <tr>
                    <td colspan="5">Carregando avisos...</td>
                </tr>
            </tbody>
        </table>

        <div class="links-acoes">
            <a class="voltar" href="cadastra_aviso.php">Cadastrar novo aviso</a>
            <a class="voltar" href="../index.php">Voltar ao início</a>
        </div>
    </div>

    <script>
        const apiUrl = <?= json_encode($apiUrl) ?>;
        const tbody = document.getElementById('lista-avisos');

        function montarLinha(aviso) {
            const tr = document.createElement('tr');
            const titulo = aviso.titulo ?? aviso.name ?? aviso.title ?? '';
            const mensagem = aviso.mensagem ?? aviso.message ?? aviso.description ?? aviso.body ?? '';
            const autor = aviso.autor ?? aviso.author ?? aviso.user ?? '';
            const dataCriacao = aviso.data_criacao ?? aviso.createdAt ?? aviso.created_at ?? '';

            tr.innerHTML = `
                <td>${aviso.id ?? ''}</td>
                <td>${titulo}</td>
                <td>${mensagem}</td>
                <td>${autor}</td>
                <td>${dataCriacao}</td>
            `;

            return tr;
        }

        async function carregarAvisos() {
            if (!apiUrl) {
                tbody.innerHTML = '<tr><td colspan="5">Configure a variável MOCKAPI_URL no arquivo .env.</td></tr>';
                return;
            }

            try {
                const response = await fetch(apiUrl);
                const dados = await response.json();

                if (!response.ok || !Array.isArray(dados)) {
                    tbody.innerHTML = '<tr><td colspan="5">Não foi possível carregar os avisos.</td></tr>';
                    return;
                }

                tbody.innerHTML = '';

                if (dados.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="5">Nenhum aviso cadastrado.</td></tr>';
                    return;
                }

                dados.forEach(aviso => {
                    tbody.appendChild(montarLinha(aviso));
                });
            } catch (error) {
                tbody.innerHTML = '<tr><td colspan="5">Não foi possível carregar os avisos.</td></tr>';
            }
        }

        carregarAvisos();
    </script>
</body>
</html>
