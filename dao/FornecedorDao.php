<?php
// DAO responsável pelas operações com a tabela fornecedor.
// Contém os comandos de inserção, leitura, atualização e exclusão.

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Fornecedor.php';

class FornecedorDao
{
    private $tabela = 'fornecedor';
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->connection;
    }

    public function salvar(Fornecedor $fornecedor)
    {
        $sql = "INSERT INTO $this->tabela (nome, telefone, email) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $fornecedor->getNome(),
            $fornecedor->getTelefone(),
            $fornecedor->getEmail()
        ]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->connection->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $fornecedores = [];

        foreach ($rows as $row) {
            $fornecedores[] = new Fornecedor(
                $row['nome'],
                $row['telefone'],
                $row['email'],
                $row['id']
            );
        }

        return $fornecedores;
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

        return new Fornecedor(
            $row['nome'],
            $row['telefone'],
            $row['email'],
            $row['id']
        );
    }

    public function atualizar(Fornecedor $fornecedor)
    {
        $sql = "UPDATE $this->tabela SET nome = ?, telefone = ?, email = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $fornecedor->getNome(),
            $fornecedor->getTelefone(),
            $fornecedor->getEmail(),
            $fornecedor->getId()
        ]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
}
