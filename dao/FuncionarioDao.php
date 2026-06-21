<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Funcionario.php';

class FuncionarioDao
{
    private $tabela = 'funcionario';
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->connection;
    }

    public function salvar(Funcionario $funcionario)
    {
        $sql = "INSERT INTO $this->tabela (nome, cargo, setor) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $funcionario->getNome(),
            $funcionario->getCargo(),
            $funcionario->getSetor()
        ]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->connection->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $funcionarios = [];

        foreach ($rows as $row) {
            $funcionarios[] = new Funcionario(
                $row['nome'],
                $row['cargo'],
                $row['setor'],
                $row['id']
            );
        }

        return $funcionarios;
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

        return new Funcionario(
            $row['nome'],
            $row['cargo'],
            $row['setor'],
            $row['id']
        );
    }

    public function atualizar(Funcionario $funcionario)
    {
        $sql = "UPDATE $this->tabela SET nome = ?, cargo = ?, setor = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $funcionario->getNome(),
            $funcionario->getCargo(),
            $funcionario->getSetor(),
            $funcionario->getId()
        ]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
}
