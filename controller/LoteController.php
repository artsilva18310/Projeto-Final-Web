<?php
// Controller responsável pela lógica dos lotes.
// Recebe os dados da view e chama o DAO correspondente.

require_once __DIR__ . '/../dao/LoteDao.php';
// carrega o DAO (que já carrega Database e Model)

// Controller: orquestra a comunicação entre DAO e Views
class LoteController
{
    public function listar()
    {
        $dao = new LoteDao();
        return $dao->listar();
    }

    // Ação de cadastro: lê o POST, salva no banco e redireciona
    public function salvar()
    {
        // Cria o objeto com os dados enviados pelo formulário
        $lote = new Lote(
            $_POST['numero_lote'],  
            $_POST['peso_bruto'],   
            $_POST['peso_liquido'], 
            $_POST['id_produto']    
        );

        $dao = new LoteDao();// instancia o DAO
        $dao->salvar($lote); // persiste o objeto no banco
        
        // redireciona para listagem após salvar
        header('Location: ../view/lista_lote.php');
        exit;
    }

    // Retorna um lote pelo id
    public function buscarPorId($id)
    {
        $dao = new LoteDao();
        return $dao->buscarPorId($id);
    }

    // Atualiza lote a partir do POST
    public function atualizar()
    {
        $lote = new Lote(
            $_POST['numero_lote'],
            $_POST['peso_bruto'],
            $_POST['peso_liquido'],
            $_POST['id_produto'],
            $_POST['id']
        );

        $dao = new LoteDao();
        $dao->atualizar($lote);

        header('Location: ../view/lista_lote.php');
        exit;
    }

    // Ação de deleção: lê o POST, remove do banco e redireciona
    public function deletar()
    {
        $dao = new LoteDao();
        $dao->deletar($_POST['id']);

        header('Location: ../view/lista_lote.php');
        exit;
    }
}
