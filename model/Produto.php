<?php

class Produto
{
    private $id;
    private $nome;
    private $tipo;
    private $pesoCaixa;
    private $descontoRotulo;
    private $cep;
    private $rua;
    private $bairro;
    private $cidade;

    public function __construct(
        $nome,
        $tipo,
        $pesoCaixa,
        $descontoRotulo,
        $cep = '',
        $rua = '',
        $bairro = '',
        $cidade = '',
        $id = null
    ) {
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->pesoCaixa = $pesoCaixa;
        $this->descontoRotulo = $descontoRotulo;
        $this->cep = $cep;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->id = $id;
    }

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

    public function getCep()
    {
        return $this->cep;
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }
}