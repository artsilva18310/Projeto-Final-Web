<?php

// Model: representa a entidade Produto — apenas dados
class Produto
{
    private $id;                // identificador gerado pelo banco
    private $nome;              // nome do produto
    private $tipo;              // tipo do produto (PI, RÓTULO, SIMPLES)
    private $pesoCaixa;         // peso unitário da caixa
    private $descontoRotulo;    // desconto/peso do rótulo

    // $id é opcional: só existe após salvar no banco
    public function __construct($nome,$tipo,$pesoCaixa,$descontoRotulo,$id = null)
    
    {
        $this->nome             = $nome;              // atribui nome ao objeto
        $this->tipo             = $tipo;              // atribui tipo
        $this->pesoCaixa        = $pesoCaixa;         // atribui peso da caixa
        $this->descontoRotulo   = $descontoRotulo;   // atribui desconto do rótulo
        $this->id               = $id;                // atribui id vindo do banco
    }

    // Getters: permitem leitura dos atributos privados

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getPesoCaixa()
    {
        return $this->pesoCaixa;
    }

    public function getDescontoRotulo()
    {
        return $this->descontoRotulo;
    }
}