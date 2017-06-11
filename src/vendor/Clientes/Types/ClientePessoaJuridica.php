<?php

namespace vendor\Clientes\Types;


use vendor\Clientes\Cliente as Client;
use vendor\Clientes\Interfaces\EnderecoInterface as EndInterface;
use vendor\Clientes\Interfaces\GraudeImportanciaInterface as GrauImport;
use vendor\Clientes\Interfaces\End_Espec_CobrancaInterface as End_Espec_Cobranc;

//require_once "EnderecoInterface.php";
//require_once "GraudeImportanciaInterface.php";
//require_once "End_Espec_CobrancaInterface.php";

class ClientePessoaJuridica extends Client implements EndInterface,GrauImport,End_Espec_Cobranc
{
    public $cnpj;
    public $endereco;
    public $cidade;
    public $uf;
    public $graudeimportancia;
    public $end_cobranca;
    public $tipo_end_cobranca;


    public function __construct(/*$cnpj,$endereco, $cidade,$uf,$graudeimportancia, $end_cobranca, $tipo_end_cobranca*/)
    {
        /*$this->cnpj = $cnpj;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->graudeimportancia = $graudeimportancia;
        $this->end_cobranca = $end_cobranca;
        $this->tipo_end_cobranca = $tipo_end_cobranca;*/
    }

    /**
     * @return mixed
     */
    public function getCNPJ()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cpf
     */
    public function setCNPJ($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cpf
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $cpf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function getGraudeImportancia()
    {
        return $this->graudeimportancia;
    }

    /**
     * @param mixed $telefone
     */
    public function setGraudeImportancia($graudeimportancia)
    {
        $this->graudeimportancia = $graudeimportancia;
    }

    public function getEnd_Cobranca(){
        return $this->end_cobranca;
    }

    public function setEnd_Cobranca($end_cobranca){
        $this->end_cobranca = $end_cobranca;
    }

    public function getTipoEnd_Cobranca(){
        return $this->tipo_end_cobranca;
    }

    public function setTipoEnd_Cobranca($tipo_end_cobranca){
        $this->tipo_end_cobranca = $tipo_end_cobranca;
    }

}