<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Produto.php';

class ProdutoDao
{
    private $tabela = 'produto';
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->connection;
    }

    public function salvar(Produto $produto)
    {
        $sql = "INSERT INTO $this->tabela
                (nome, tipo, peso_caixa, desconto_rotulo, cep, rua, bairro, cidade)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $produto->getNome(),
            $produto->getTipo(),
            $produto->getPesoCaixa(),
            $produto->getDescontoRotulo(),
            $produto->getCep(),
            $produto->getRua(),
            $produto->getBairro(),
            $produto->getCidade()
        ]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->connection->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $produtos = [];

        foreach ($rows as $row) {
            $produtos[] = new Produto(
                $row['nome'],
                $row['tipo'],
                $row['peso_caixa'],
                $row['desconto_rotulo'],
                $row['cep'] ?? '',
                $row['rua'] ?? '',
                $row['bairro'] ?? '',
                $row['cidade'] ?? '',
                $row['id']
            );
        }

        return $produtos;
    }

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
            $row['cep'] ?? '',
            $row['rua'] ?? '',
            $row['bairro'] ?? '',
            $row['cidade'] ?? '',
            $row['id']
        );
    }

    public function atualizar(Produto $produto)
    {
        $sql = "UPDATE $this->tabela SET nome = ?, tipo = ?, peso_caixa = ?, desconto_rotulo = ?, cep = ?, rua = ?, bairro = ?, cidade = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $produto->getNome(),
            $produto->getTipo(),
            $produto->getPesoCaixa(),
            $produto->getDescontoRotulo(),
            $produto->getCep(),
            $produto->getRua(),
            $produto->getBairro(),
            $produto->getCidade(),
            $produto->getId()
        ]);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
}