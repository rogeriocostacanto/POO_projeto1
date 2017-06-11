<?php


namespace vendor\Database;

use \PDO;
use vendor\Clientes\Types\ClientePessoaFisica;
use vendor\Clientes\Types\ClientePessoaJuridica;


class Conexao
{
    public $pdo;

    public function __construct()
    {


        $this->pdo = new PDO('mysql:host=localhost;dbname=banco_aula_oo_proj1', 'root', '123456');

    }


    public function persist()
    {


        $lista = array();

        $consulta = $this->pdo->query('SELECT * FROM clientePF');
        $i = 0;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $cliente = new ClientePessoaFisica();

            $cliente->setNome($linha['nome_PF']);
            $cliente->setCPF($linha['cpf_PF']);
            $cliente->setEndereco($linha['endereco_PF']);
            $cliente->setCidade($linha['cidade_PF']);
            $cliente->setUf($linha['uf_PF']);
            $cliente->setEnd_Cobranca($linha['end_cobranca_PF']);
            $cliente->setTipoEnd_Cobranca($linha['tipo_end_cobranca_PF']);
            $cliente->setTelefone($linha['telefone_PF']);
            // $cliente->setGraudeImportancia($linha[]);


            $lista[$i] = $cliente;
            $i = $i + 1;

        }

        $consulta = $this->pdo->query('SELECT * FROM clientePJ');

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $cliente = new ClientePessoaJuridica();

            $cliente->setNome($linha['nome_PJ']);
            $cliente->setCNPJ($linha['cnpj_PJ']);
            $cliente->setEndereco($linha['endereco_PJ']);
            $cliente->setCidade($linha['cidade_PJ']);
            $cliente->setUf($linha['uf_PJ']);
            $cliente->setEnd_Cobranca($linha['end_cobranca_PJ']);
            $cliente->setTipoEnd_Cobranca($linha['tipo_end_cobranca_PJ']);
            $cliente->setTelefone($linha['telefone_PJ']);
            // $cliente->setGraudeImportancia($linha[]);


            $lista[$i] = $cliente;
            $i = $i + 1;

        }

        return $lista;
    }

    public function flush($client)
    {
       $consulta = $this->pdo->query("INSERT INTO clientePF
        (id_PF,
            nome_PF,
            telefone_PF,
            cpf_PF,
            endereco_PF,
            cidade_PF,
            uf_PF,
            end_cobranca_PF,
            tipo_end_cobranca_PF)
        VALUES
        (9,
         '".$client->getNome()."',
         '".$client->getTelefone()."',
         '".$client->getCPF()."',
         '".$client->getEndereco()."',
         '".$client->getCidade()."',
         '".$client->getUf()."',
         '".$client->getEnd_Cobranca()."',
         '".$client->getTipoEnd_Cobranca()."')");

}

}