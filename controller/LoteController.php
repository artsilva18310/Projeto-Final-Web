<?php

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
}
