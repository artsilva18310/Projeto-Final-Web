<?php

class Aviso
{
    private $id;
    private $titulo;
    private $mensagem;
    private $autor;
    private $dataCriacao;

    public function __construct($titulo, $mensagem, $autor, $dataCriacao = null, $id = null)
    {
        $this->titulo = $titulo;
        $this->mensagem = $mensagem;
        $this->autor = $autor;
        $this->dataCriacao = $dataCriacao;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getMensagem()
    {
        return $this->mensagem;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }
}