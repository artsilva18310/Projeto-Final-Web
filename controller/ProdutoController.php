<?php
// Controller responsável por receber as ações relacionadas aos produtos.
// Faz a ligação entre a view e o DAO, processando salvar, listar, editar e excluir.

require_once __DIR__ . '/../dao/ProdutoDao.php';

class ProdutoController
{
    // Retorna todos os produtos cadastrados
    public function listar()
    {
        $dao = new ProdutoDao();
        return $dao->listar();
    }
}
// Salva um novo produto no banco de dados
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
// Cria uma instância do DAO e chama o método salvar
        $dao = new ProdutoDao();
        $dao->salvar($produto);
// Redireciona para a lista de produtos após salvar
        header('Location: ../view/lista.php');
        exit;
    }
// Busca um produto pelo id, usado para edição
    public function buscarPorId($id)
    {
        $dao = new ProdutoDao();
        return $dao->buscarPorId($id);
    }
// Atualiza um produto existente no banco de dados
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

// Exclui um produto pelo id, mas apenas se não houver lotes associados
   public function excluir()
{
    $id = $_POST['id'];

    $dao = new ProdutoDao();

    if ($dao->excluir($id)) {
        header("Location: ../view/lista.php?msg=excluido");
    } else {
        header("Location: ../view/lista.php?erro=produto_com_lote");
    }
}