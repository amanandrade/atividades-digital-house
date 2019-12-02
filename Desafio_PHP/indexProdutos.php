<?php 
session_start();
if (!$_SESSION['usuario']) header('Location: login.php');

    //função para pegar os arquivos do produtoscadastrados.json
    function getProdutos(){
        $produtosJson = file_get_contents("./basedados/produtoscadastrados.json");
        return json_decode($produtosJson, true);
    };
    $getprodutos = getProdutos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- inserindo o bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Tabela de produtos</title>
</head>
<body>
    <nav class="container-fluid p-3 mb-3">
        <span class="navbar-brand ml-5" href="#">Desafio PHP</span>
        <ul class="nav nav-tabs justify-content-end mx-5">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Produtos</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="indexProdutos.php">Todos Produtos</a>
                <a class="dropdown-item" href="createProduto.php">Cadastrar Produtos</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuários</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="showUsuarios.php">Todos Usuários</a>
                <a class="dropdown-item" href="createUsuario.php">Cadastrar Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Sair</a>
            </li>
        </ul>
    </nav>
    <div class="container mt-4">
    <span><h2>Todos Produtos</h2></span>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Mostrar produto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getprodutos as $produto) { ?>
                    <tr scope="row">
                        <td><?= $produto['id'] ?></td>
                        <td><?= $produto['nome'] ?></td>
                        <td><?= $produto['descricao'] ?></td>
                        <td>R$ <?= $produto['preco'] ?></td>
                        <td><a href="showProdutos.php?id=<?= $produto['id'] ?>"><i class="material-icons" style="font-size: 30px">pageview</i></a></th>
                    </tr>
                <?php }; ?>
            </tbody>

        </table>
    </div>

    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
</body>
</html>