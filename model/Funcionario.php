<?php

class Funcionario
{
    private $id;
    private $nome;
    private $cargo;
    private $setor;

    public function __construct($nome, $cargo, $setor, $id = null)
    {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->setor = $setor;
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

    public function getCargo()
    {
        return $this->cargo;
    }

    public function getSetor()
    {
        return $this->setor;
    }
}
