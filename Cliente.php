<?php


class Cliente
{
    public $nome;
    public $telefone;


    /**
     * Cliente constructor.
     * @param $nome
     * @param $telefone
     */
    public function __construct($nome, $telefone)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;

    }


    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
}