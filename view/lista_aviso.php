<?php
// Listagem de avisos via MockAPI usando JavaScript fetch.

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

        <div class="tabela-container">

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

        </div>

        <div class="links-acoes">
            <a class="voltar" href="cadastra_aviso.php">Cadastrar novo aviso</a>
            <a class="voltar" href="../index.php">Voltar ao início</a>
        </div>

    </div>

    <script>
        const apiUrl = <?= json_encode($apiUrl) ?>;
        const tbody = document.getElementById('lista-avisos');

        async function carregarAvisos() {

            if (!apiUrl) {
                tbody.innerHTML = '<tr><td colspan="5">Configure a variável MOCKAPI_URL no arquivo .env.</td></tr>';
                return;
            }

            const response = await fetch(apiUrl);
            const dados = await response.json();

            tbody.innerHTML = '';

            if (!Array.isArray(dados) || dados.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5">Nenhum aviso cadastrado.</td></tr>';
                return;
            }

            dados.forEach(function (aviso) {

                const tr = document.createElement('tr');

                tr.innerHTML = `
                    <td>${aviso.id ?? ''}</td>
                    <td>${aviso.titulo ?? ''}</td>
                    <td>${aviso.mensagem ?? ''}</td>
                    <td>${aviso.autor ?? ''}</td>
                    <td>${aviso.data_criacao ?? aviso.createdAt ?? ''}</td>
                `;

                tbody.appendChild(tr);
            });
        }

        carregarAvisos();
    </script>

</body>

</html>
