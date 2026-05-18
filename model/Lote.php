<?php

// Model: representa a entidade Lote — apenas dados
class Lote
{
    private $id;           // identificador gerado pelo banco
    private $numeroLote;   // número do lote
    private $pesoBruto;    // peso bruto do lote
    private $pesoLiquido;  // peso líquido do lote
    private $idProduto;    // produto associado ao lote

    // Construtor: recebe os dados para criar um objeto Lote
    public function __construct($numeroLote, $pesoBruto, $pesoLiquido, $idProduto, $id = null)
    {
        $this->numeroLote  = $numeroLote;  // atribui nome ao objeto
        $this->pesoBruto   = $pesoBruto;  // atribui tipo
        $this->pesoLiquido = $pesoLiquido; // atribui peso da caixa
        $this->idProduto   = $idProduto; // atribui desconto do rótulo
        $this->id          = $id;               // atribui id vindo do banco
    }

    // Getters: permitem leitura dos atributos privados
    public function getId()
    {
        return $this->id;
    }

    public function getNumeroLote()
    {
        return $this->numeroLote;
    }

    public function getPesoBruto()
    {
        return $this->pesoBruto;
    }

    public function getPesoLiquido()
    {
        return $this->pesoLiquido;
    }

    public function getIdProduto()
    {
        return $this->idProduto;
    }
}
