<?php

require_once __DIR__ . '/../Database.php';      // carrega a conexão com banco
require_once __DIR__ . '/../model/Produto.php'; // carrega o Model

// DAO (Data Access Object): responsável pelas operações no banco
class ProdutoDao
{
    private $tabela     = 'produto'; // nome da tabela no banco
    private $connection;             // conexão PDO

    public function __construct()
    {
        $db               = new Database();       // cria conexão com banco
        $this->connection = $db->connection;      // armazena conexão
    }

    // Insere um novo produto na tabela
    public function salvar(Produto $produto)
    {
        // Usa parâmetros para evitar SQL Injection
        $sql = "INSERT INTO $this->tabela
                (nome, tipo, peso_caixa, desconto_rotulo)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->connection->prepare($sql);

        // Executa usando os getters do Model
        $stmt->execute([

            $produto->getNome(),
            $produto->getTipo(),
            $produto->getPesoCaixa(),
            $produto->getDescontoRotulo()

        ]);
    }

    // Retorna todos os produtos cadastrados
    public function listar()
    {
        $sql  = "SELECT * FROM $this->tabela";

        $stmt = $this->connection->query($sql);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $produtos = []; // vetor de objetos Produto

        foreach ($rows as $row) {

            // Cria objeto Produto para cada registro do banco
            $produtos[] = new Produto(

                $row['nome'],
                $row['tipo'],
                $row['peso_caixa'],
                $row['desconto_rotulo'],
                $row['id']

            );
        }
        // Retorna o vetor de produtos para a Controller usar na View
        return $produtos;
    }

    // Busca um produto por id
    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Produto(
            $row['nome'],
            $row['tipo'],
            $row['peso_caixa'],
            $row['desconto_rotulo'],
            $row['id']
        );
    }

    // Atualiza um produto existente
    public function atualizar(Produto $produto)
    {
        $sql = "UPDATE $this->tabela SET nome = ?, tipo = ?, peso_caixa = ?, desconto_rotulo = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $produto->getNome(),
            $produto->getTipo(),
            $produto->getPesoCaixa(),
            $produto->getDescontoRotulo(),
            $produto->getId()
        ]);
    }

    // Remove um produto pelo id
    public function deletar($id)
    {
        $sql = "DELETE FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
}