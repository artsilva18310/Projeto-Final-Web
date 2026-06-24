<?php
// Model da entidade Produto.
// Representa os dados do produto e fornece getters para leitura.

class Produto
{// Atributos privados do produto
    private $id;// identificador do produto no banco
    private $nome;//   nome do produto
    private $tipo;//   tipo do produto
    private $pesoCaixa;//   peso da caixa
    private $descontoRotulo;//   desconto do rótulo
    private $cep;//  CEP
    private $rua;//  rua
    private $bairro;// bairro
    private $cidade;// cidade

    public function __construct(// Construtor: recebe os dados do produto e cria um objeto Produto
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
        $this->nome = $nome;// atribui nome ao objeto
        $this->tipo = $tipo;// atribui tipo ao objeto
        $this->pesoCaixa = $pesoCaixa;// atribui peso da caixa ao objeto
        $this->descontoRotulo = $descontoRotulo;// atribui desconto do rótulo ao objeto
        $this->cep = $cep;// atribui cep ao objeto
        $this->rua = $rua;//   atribui rua ao objeto
        $this->bairro = $bairro;// atribui bairro ao objeto
        $this->cidade = $cidade;// atribui cidade ao objeto
        $this->id = $id;// atribui id ao objeto
    }
// Getters: métodos para acessar os atributos privados do produto
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