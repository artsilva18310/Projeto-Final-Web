<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Lote.php';
// DAO (Data Access Object): responsável pelas operações no banco
class LoteDao
{
    private $tabela = 'lote'; // nome da tabela no banco
    private $connection;// conexão PDO

    public function __construct()
    {
        $db = new Database(); // cria conexão com banco
        $this->connection = $db->connection;//  armazena conexão
    }
// Insere um novo lote na tabela
    public function salvar(Lote $lote)
    {
// Usa parâmetros para evitar SQL Injection
        $sql = "INSERT INTO $this->tabela
                (numero_lote, peso_bruto, peso_liquido, id_produto)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->connection->prepare($sql);
        // Executa usando os getters do Model
        $stmt->execute([
            $lote->getNumeroLote(),
            $lote->getPesoBruto(),
            $lote->getPesoLiquido(),
            $lote->getIdProduto()
        ]);
    }
// Retorna todos os lotes cadastrados
    public function listar()
    {
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->connection->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lotes = []; // vetor de objetos Lote
   // Cria objeto Lote para cada registro do banco
        foreach ($rows as $row) {
            $lotes[] = new Lote(
                $row['numero_lote'],
                $row['peso_bruto'],
                $row['peso_liquido'],
                $row['id_produto'],
                $row['id']
            );
        }
// Retorna o vetor de lotes para a Controller usar na View
        return $lotes;
    }

    // Busca um lote por id
    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Lote(
            $row['numero_lote'],
            $row['peso_bruto'],
            $row['peso_liquido'],
            $row['id_produto'],
            $row['id']
        );
    }

    // Atualiza um lote existente
    public function atualizar(Lote $lote)
    {
        $sql = "UPDATE $this->tabela SET numero_lote = ?, peso_bruto = ?, peso_liquido = ?, id_produto = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $lote->getNumeroLote(),
            $lote->getPesoBruto(),
            $lote->getPesoLiquido(),
            $lote->getIdProduto(),
            $lote->getId()
        ]);
    }

    // Remove um lote pelo id
    public function deletar($id)
    {
        $sql = "DELETE FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
}
