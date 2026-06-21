<?php

class Fornecedor
{
    private $id;
    private $nome;
    private $telefone;
    private $email;

    public function __construct($nome, $telefone, $email, $id = null)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
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

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
