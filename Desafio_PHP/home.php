<?php 
session_start();
if (!$_SESSION['usuario']) header('Location: login.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- inserindo o bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Home</title>
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
    <main>
        <div class="container">
            <h2>Desafio PHP</h2>
            <hr>
            <p>
                1. Criar uma tela <b>createProduto.php</b> com um formulário a partir do
                qual o usuário poderá cadastrar produtos. Precisaremos dos
                seguintes campos:
                - nome do produto
                - descrição do produto
                -	preço
                - foto (upload)
            </p>
            <p>
                Deve-se validar os campos do lado do servidor e, eventualmente,
                destacar os campos preenchidos incorretamente segundo os
                critérios:
                - O preço deve ser numérico.
                - O nome do produto e a foto são obrigatórios.
                - A descrição é opcional.
            </p>

            <p>A descrição é opcional. Salvar os produtos num arquivo
            produtos.json. Cada produto deve ter um número inteiro único como
            identificador.</p>
            <hr>
            <p>2. Criar uma tela <b>indexProdutos.php</b> que deve mostrar uma tabela
            com todas as informações de todos os produtos exceto a foto. A
            última coluna dessa tabela deve ser um link para a tela descrita na
            tela abaixo.</p>
            <hr>
            <p>3. Criar uma tela <b>showProduto.php</b> com as informações de um
            produto. Essa tela deve permitir a exclusão do produto.</p>
            <hr>
            <p>4. Fazer uma tela <b>editProduto.php</b> que permita a alterção das
            informações de um produto.</p>
            <hr>
            <p>5. Criar uma tela <b>createUsuario.php</b> de cadastro de usuários com
            campos nome, e-mail, senha e confirmação de senha. Guardar
            usuários num arquivo usuarios.json. Os campos devem ser validados
            seguindo os seguintes critérios:</p>

            <p>- O nome e o email são de preenchimentos obrigatórios.
            - A senha deve ter no mínimo 6 caracteres.
            - A senha e a confirmação de senha devem ser iguais.</p>

            <p>A senha de cada usuário deve ser armazenada criptografada. A tela
            de cadastro dos usuários também deve conter uma lista com todos
            os usuários.
            Ao lado de cada usuário acrescente um botão que, quando clicado,
            deve remover o usuário.</p>    
            <hr>
            <p>6. Cada item da lista de usuários (item 5) deve conter um link que
            direciona para uma tela que será capaz de alterar as informações de
            um usuário.</p>
            <hr>
            <p>7. Fazer uma tela de <b>login</b> para os usuários.</p>
            <hr>
            <p>8. Fazer com que o acesso às telas construídas nos items 1, 2, 3, 4, 5
            e 6. Sejam acessíveis somente a usuários logados.</p>
            
        </div>
    </main>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>

</body>
</html>