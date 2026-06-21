<?php

require_once __DIR__ . '/../dao/ProdutoDao.php';

class ProdutoController
{
    public function listar()
    {
        $dao = new ProdutoDao();
        return $dao->listar();
    }

    public function salvar()
    {
        $produto = new Produto(
            $_POST['nome'] ?? '',
            $_POST['tipo'] ?? '',
            $_POST['peso_caixa'] ?? 0,
            $_POST['desconto_rotulo'] ?? 0,
            $_POST['cep'] ?? '',
            $_POST['rua'] ?? '',
            $_POST['bairro'] ?? '',
            $_POST['cidade'] ?? ''
        );

        $dao = new ProdutoDao();
        $dao->salvar($produto);

        header('Location: ../view/lista.php');
        exit;
    }

    public function buscarPorId($id)
    {
        $dao = new ProdutoDao();
        return $dao->buscarPorId($id);
    }

    public function atualizar()
    {
        $produto = new Produto(
            $_POST['nome'] ?? '',
            $_POST['tipo'] ?? '',
            $_POST['peso_caixa'] ?? 0,
            $_POST['desconto_rotulo'] ?? 0,
            $_POST['cep'] ?? '',
            $_POST['rua'] ?? '',
            $_POST['bairro'] ?? '',
            $_POST['cidade'] ?? '',
            $_POST['id'] ?? null
        );

        $dao = new ProdutoDao();
        $dao->atualizar($produto);

        header('Location: ../view/lista.php');
        exit;
    }

    public function deletar()
    {
        $dao = new ProdutoDao();
        $dao->deletar($_POST['id'] ?? null);

        header('Location: ../view/lista.php');
        exit;
    }
}