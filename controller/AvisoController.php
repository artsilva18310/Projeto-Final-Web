<?php
// Controller utilizado para integrar o CRUD parcial de avisos com a MockAPI.
// Não usa banco local; faz requisições HTTP para a API externa.

require_once __DIR__ . '/../model/Aviso.php';

class AvisoController
{
    private function getBaseUrl()
    {
        return rtrim(getenv('MOCKAPI_URL') ?: '', '/');
    }

    private function request($method, $url, $data = null)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if ($data !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response === false || $httpCode >= 400) {
            return null;
        }

        return json_decode($response, true);
    }

    public function listar()
    {
        $baseUrl = $this->getBaseUrl();
        if ($baseUrl === '') {
            return [];
        }

        $data = $this->request('GET', $baseUrl);
        if (!is_array($data)) {
            return [];
        }

        $avisos = [];
        foreach ($data as $item) {
            $avisos[] = new Aviso(
                $item['titulo'] ?? '',
                $item['mensagem'] ?? '',
                $item['autor'] ?? '',
                $item['data_criacao'] ?? null,
                $item['id'] ?? null
            );
        }

        return $avisos;
    }

    public function salvar()
    {
        $baseUrl = $this->getBaseUrl();
        if ($baseUrl === '') {
            return;
        }

        $dados = [
            'titulo' => $_POST['titulo'] ?? '',
            'mensagem' => $_POST['mensagem'] ?? '',
            'autor' => $_POST['autor'] ?? ''
        ];

        $this->request('POST', $baseUrl, $dados);

        header('Location: ../view/lista_aviso.php');
        exit;
    }
}