<?php
// Controller responsável pela lógica dos funcionários.
// Centraliza as ações de cadastro, leitura, edição e exclusão.

require_once __DIR__ . '/../dao/FuncionarioDao.php';

class FuncionarioController
{
    public function listar()
    {
        $dao = new FuncionarioDao();
        return $dao->listar();
    }

    public function salvar()
    {
        $funcionario = new Funcionario(
            $_POST['nome'] ?? '',
            $_POST['cargo'] ?? '',
            $_POST['setor'] ?? ''
        );

        $dao = new FuncionarioDao();
        $dao->salvar($funcionario);

        header('Location: ../view/lista_funcionario.php');
        exit;
    }

    public function buscarPorId($id)
    {
        $dao = new FuncionarioDao();
        return $dao->buscarPorId($id);
    }

    public function atualizar()
    {
        $funcionario = new Funcionario(
            $_POST['nome'] ?? '',
            $_POST['cargo'] ?? '',
            $_POST['setor'] ?? '',
            $_POST['id'] ?? null
        );

        $dao = new FuncionarioDao();
        $dao->atualizar($funcionario);

        header('Location: ../view/lista_funcionario.php');
        exit;
    }

    public function excluir()
    {
        $dao = new FuncionarioDao();
        $dao->excluir($_POST['id']);

        header('Location: ../view/lista_funcionario.php');
        exit;
    }
}
