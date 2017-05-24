<?php


require_once "Cliente.php";
require_once "ClientePessoaFisica.php";
require_once "ClientePessoaJuridica.php";

$pessoas = array();


$pessoas[1] = new ClientePessoaFisica('140.101.144.33','rua joao vespucio, n62, bairro centro','Formiga',
    'MG','rua joao vespucio, n62, bairro centro','casa','5');
$pessoas[1]->setNome('Rogério Canto');
$pessoas[1]->setTelefone('37-99999-8888');

$pessoas[2] = new ClientePessoaFisica('155.555.555.55','rua sao luis, n33, bairro sao luis','Formiga',
    'MG','rua joao vaz, n6555, bairro centro','comercial','3');
$pessoas[2]->setNome('Jose Silva');
$pessoas[2]->setTelefone('37-88999-0099');

$pessoas[3] = new ClientePessoaFisica('999.555.999.55','rua sao luis, n444, bairro sao luis','Formiga',
    'MG','rua joao vaz, n6555, bairro centro','comercial','3');
$pessoas[3]->setNome('Carol Dias');
$pessoas[3]->setTelefone('37-44444-4444');

$pessoas[4] = new ClientePessoaFisica('315.335.333.33','rua sao luis, n33, bairro sao luis','Formiga',
    'MG','rua joao vaz, n6555, bairro centro','comercial','4');
$pessoas[4]->setNome('Francisco Xavier');
$pessoas[4]->setTelefone('37-33339-3339');

$pessoas[5] = new ClientePessoaFisica('009.500.909.00','rua dos viajantes, n3344, bairro sao luis','Formiga',
    'MG','rua joao vaz, n5555, bairro centro','comercial','4');
$pessoas[5]->setNome('Claudia Ohana');
$pessoas[5]->setTelefone('37-22222-2222');

$pessoas[6] = new ClientePessoaJuridica('559.555.559.55','rua sao luis, n114, bairro sao luis','Formiga',
    'MG','rua joao vaz, n6555, bairro centro','comercial','3');
$pessoas[6]->setNome('Lojas birobiro');
$pessoas[6]->setTelefone('37-44444-4444');

$pessoas[7] = new ClientePessoaJuridica('77.377.373.73','rua sao luis, n77, bairro sao luis','Formiga',
    'MG','rua joao vaz, n6555, bairro centro','comercial','4');
$pessoas[7]->setNome('Açougue Bom');
$pessoas[7]->setTelefone('37-37779-3339');

$pessoas[8] = new ClientePessoaJuridica('0569.556.969.00','rua dos viajantes, n3344, bairro sao luis','Formiga',
    'MG','rua joao vaz, n5555, bairro centro','comercial','4');
$pessoas[8]->setNome('Papelaria Escolar');
$pessoas[8]->setTelefone('37-26662-2222');

$pessoas[9] = new ClientePessoaJuridica('55.377.353.73','rua sao luis, n77, bairro sao luis','Formiga',
    'MG','rua joao vaz, n6555, bairro centro','comercial','4');
$pessoas[9]->setNome('Farmacia Drogabom');
$pessoas[9]->setTelefone('37-55779-3339');

$pessoas[10] = new ClientePessoaJuridica('789.577.779.00','rua dos viajantes, n3344, bairro sao luis','Formiga',
    'MG','rua joao vaz, n5555, bairro centro','comercial','4');
$pessoas[10]->setNome('Laboratorio Veruska');
$pessoas[10]->setTelefone('37-26662-2222');



$id = $_GET['id'];

$ordem = $_GET['ordem'];

if($ordem == 'desc'){
    $ordem = 'asc';
    krsort($pessoas);
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
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

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
            if(!array_key_exists($id,$pessoas)):
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
            foreach ($pessoas as $key => $pessoa) {
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
            $pessoa = $pessoas[$id];
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
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
