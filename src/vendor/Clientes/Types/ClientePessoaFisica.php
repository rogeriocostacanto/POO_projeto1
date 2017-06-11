<?php

namespace vendor\Clientes\Types;

use vendor\Clientes\Cliente as Client;
use vendor\Clientes\Interfaces\EnderecoInterface as EndInterface;
use vendor\Clientes\Interfaces\GraudeImportanciaInterface as GrauImport;
use vendor\Clientes\Interfaces\End_Espec_CobrancaInterface as End_Espec_Cobranc;


class ClientePessoaFisica extends Client implements EndInterface,GrauImport,End_Espec_Cobranc
{
    public $cpf;
    public $endereco;
    public $cidade;
    public $uf;
    public $end_cobranca;
    public $tipo_end_cobranca;
    public $graudeimportancia;

    public function __construct(/*$cpf,$endereco, $cidade,$uf,$end_cobranca,$tipo_end_cobranca,$graudeimportancia*/)
    {
        /*
        $this->cpf = $cpf;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->end_cobranca = $end_cobranca;
        $this->tipo_end_cobranca = $tipo_end_cobranca;
        $this->graudeimportancia = $graudeimportancia;
*/
    }

    /**
     * @return mixed
     */
    public function getCPF()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
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