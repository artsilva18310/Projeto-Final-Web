<?php

require_once __DIR__ . '/../dao/ProdutoDao.php'; 
// carrega o DAO (que já carrega Database e Model)

// Controller: orquestra a comunicação entre DAO e Views
class ProdutoController
{
    // Retorna todos os produtos buscados do banco
    public function listar()
    {
        $dao = new ProdutoDao();

        return $dao->listar();
    }

    // Ação de cadastro: lê o POST, salva no banco e redireciona
    public function salvar()
    {
        // Cria o objeto com os dados enviados pelo formulário
        $produto = new Produto(

            $_POST['nome'],               // nome do produto
            $_POST['tipo'],               // tipo do produto
            $_POST['peso_caixa'],         // peso da caixa
            $_POST['desconto_rotulo']     // desconto/peso do rótulo

        );

        $dao = new ProdutoDao(); // instancia o DAO

        $dao->salvar($produto);  // persiste o objeto no banco

        // redireciona para listagem após salvar
        header("Location: ../view/lista.php");
    }

    // Retorna um produto pelo id
    public function buscarPorId($id)
    {
        $dao = new ProdutoDao();
        return $dao->buscarPorId($id);
    }

    // Atualiza produto a partir do POST
    public function atualizar()
    {
        $produto = new Produto(
            $_POST['nome'],
            $_POST['tipo'],
            $_POST['peso_caixa'],
            $_POST['desconto_rotulo'],
            $_POST['id']
        );

        $dao = new ProdutoDao();
        $dao->atualizar($produto);

        header("Location: ../view/lista.php");
        exit;
    }

    // Ação de deleção: lê o POST, remove do banco e redireciona
    public function deletar()
    {
        $dao = new ProdutoDao();
        $dao->deletar($_POST['id']);

        header("Location: ../view/lista.php");
        exit;
    }
}