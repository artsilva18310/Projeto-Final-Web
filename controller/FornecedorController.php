<?php
// Controller responsável pela lógica dos fornecedores.
// Gerencia o fluxo entre a view e o DAO.

require_once __DIR__ . '/../dao/FornecedorDao.php';

class FornecedorController
{
    public function listar()
    {
        $dao = new FornecedorDao();
        return $dao->listar();
    }

    public function salvar()
    {
        $fornecedor = new Fornecedor(
            $_POST['nome'] ?? '',
            $_POST['telefone'] ?? '',
            $_POST['email'] ?? ''
        );

        $dao = new FornecedorDao();
        $dao->salvar($fornecedor);

        header('Location: ../view/lista_fornecedor.php');
        exit;
    }

    public function buscarPorId($id)
    {
        $dao = new FornecedorDao();
        return $dao->buscarPorId($id);
    }

    public function atualizar()
    {
        $fornecedor = new Fornecedor(
            $_POST['nome'] ?? '',
            $_POST['telefone'] ?? '',
            $_POST['email'] ?? '',
            $_POST['id'] ?? null
        );

        $dao = new FornecedorDao();
        $dao->atualizar($fornecedor);

        header('Location: ../view/lista_fornecedor.php');
        exit;
    }

    public function excluir()
    {
        $dao = new FornecedorDao();
        $dao->excluir($_POST['id']);

        header('Location: ../view/lista_fornecedor.php');
        exit;
    }
}
