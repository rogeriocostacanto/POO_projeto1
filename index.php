<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 17/05/17
 * Time: 14:47
 */

require_once "Cliente.php";

$pessoas = array();


$pessoas[1] = new Cliente('Rogério Canto', '140.101.144.33', 'rua joao vespucio, n62, bairro centro,', '3799999-8888');
$pessoas[2] = new Cliente('José Silva', '150.551.774.77', 'rua sao luis, n22, bairro sao luis,', '3799999-99999');
$pessoas[3] = new Cliente('Carol Dias', '122.122.122.33', 'rua teste, n68, bairro alvorada,', '3799999-7777');
$pessoas[4] = new Cliente('Emilio Surita', '900.101.199.99', 'rua barao de piumhi, n99, bairro centro,', '3799999-4444');
$pessoas[5] = new Cliente('Silvio Santos', '140.101.144.33', 'rua quintino, n62, bairro centro,', '3799999-8888');
$pessoas[6] = new Cliente('Claudia Raia', '150.551.774.77', 'rua sao luis, n22, bairro sao luis,', '3799999-99999');
$pessoas[7] = new Cliente('Sandy Jr', '122.122.122.33', 'rua teste, n6855, bairro alvorada,', '3799999-7777');
$pessoas[8] = new Cliente('Rodolfo Abrantes', '900.101.199.99', 'rua barao de piumhi, n99, bairro centro,', '3799999-4444');
$pessoas[9] = new Cliente('Claudio Ricardo', '122.122.122.33', 'rua testeteste, n6821, bairro quinzinho,', '3799999-7777');
$pessoas[10] = new Cliente('Fausto Silva', '900.101.199.99', 'rua barao de piumhi, n99, bairro centro,', '3799999-4444');

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
                        <a href="index.php?&id=<?php echo $key ?>"><?php echo $pessoa->getNome(); ?></a>
                    </td>
                    <td>
                        <?php echo $pessoa->getCPF(); ?>
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
                <th>Telefone</th>
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
                    <?php echo $pessoa->getCPF(); ?>
                </td>
                <td>
                    <?php echo $pessoa->getEndereco(); ?>
                </td>
                <td>
                    <?php echo $pessoa->getTelefone(); ?>
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
