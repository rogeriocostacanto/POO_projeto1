<?php

use vendor\Clientes\Types\ClientePessoaFisica;


define('CLASS_DIR','src/');
//set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
set_include_path('/var/www/html/aula_oo/'.CLASS_DIR);
spl_autoload_register('loader');

function loader($class) {
    $class = str_ireplace('\\',DIRECTORY_SEPARATOR,$class);
    include $class . '.php';
}

$client = new vendor\Clientes\Types\ClientePessoaFisica();
$client->setNome('Biro Biro');
$client->setCPF('315.335.333.33');
$client->setTelefone('37-33339-3339');
$client->setEndereco('rua sao luis, n33, bairro sao luis');
$client->setCidade('Formiga');
$client->setUf('MG');
$client->setEnd_Cobranca('rua joao vaz, n6555, bairro centro');
$client->setTipoEnd_Cobranca('comercial');


$conn = new \vendor\Database\Conexao();

$conn->flush($client);

$lista=$conn->persist();



$id = @$_GET['id'];

$ordem = @$_GET['ordem'];

if($ordem == 'desc'){
    $ordem = 'asc';
    krsort($lista);
}else{
    $ordem = 'desc';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Aula de OO - Projeto 1</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Projeto 1</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="starter-template">
        <h1 class="page-header">Lista de clientes</h1>

        <table class="table table-bordered">
            <!-- Listar Cliente -->
            <?php
            if(!array_key_exists($id,$lista)):
            ?>
            <thead>
            <tr>
                <th><a href="index.php?&ordem=<?php echo $ordem ?>">#</a></th>
                <th>Cliente</th>
                <th>Nome</th>
                <th>CPF</th>
            </tr>
            </thead>
            <tbody>
            <?php
           // foreach ($pessoas as $key => $pessoa) {
                foreach ($lista as $key => $pessoa){
                ?>
                <tr>
                    <td>
                        <?php echo $key; ?>
                    </td>
                    <td>
                        <?php
                        if ($pessoa instanceof ClientePessoaFisica) {
                            echo 'PessoaFisica';
                        }else{
                            echo 'PessoaJuridica';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="index.php?&id=<?php echo $key ?>"><?php echo $pessoa->getNome(); ?></a>
                    </td>
                    <td>
                        <?php
                        if ($pessoa instanceof ClientePessoaFisica) {
                            echo $pessoa->getCPF();
                        }else{
                            echo $pessoa->getCNPJ();
                        }
                        ?>
                    </td>
                </tr>
                <?php
            };
            ?>
            </tbody>
        </table>

        <!-- Fim Listar Cliente -->

        <!-- Detalhe Cliente -->
        <?php else: ?>
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Telefone</th>
                <th>Endereco de Cobranca</th>
                <th>Tipo</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $pessoa = $lista[$id];
            ?>
            <tr>
                <td>
                    <?php echo $id; ?>
                </td>
                <td>
                    <?php echo $pessoa->getNome(); ?>
                </td>
                <td>
                    <?php if ($pessoa instanceof ClientePessoaFisica) {
                        echo $pessoa->getCPF();
                    }else{
                        echo $pessoa->getCNPJ();
                    } ?>
                </td>
                <td>
                    <?php echo $pessoa->getEndereco(); ?>
                </td>
                <td>
                    <?php echo $pessoa->getCidade(); ?>
                </td>
                <td>
                    <?php echo $pessoa->getUF(); ?>
                </td>
                <td>
                    <?php echo $pessoa->getTelefone(); ?>
                </td>
                <td>
                    <?php echo $pessoa->getEnd_Cobranca(); ?>
                </td>
                <td>
                    <?php echo $pessoa->getTipoEnd_Cobranca(); ?>
                </td>
            </tr>

            </tbody>
            </table>
            <a class="btn btn-default" href="index.php" >
                Voltar
            </a>
            <!-- Fim Detalhe Cliente -->
        <?php endif;?>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
