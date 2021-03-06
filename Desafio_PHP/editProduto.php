<?php 
session_start();
if (!$_SESSION['usuario']) header('Location: login.php');

    $erro_numero = false;
    $erro_nome = false;
    $erro_foto = false;

    if($_POST){

        //validação do campo preço
        if(!is_numeric($_POST['preco'])){
           $erro_numero = true;
        };

        //validação do erro de nome do produto
        if($_POST['nome']){
            $erro_nome = false;
        } else {
            $erro_nome = true;
        };

        //validação do erro de foto
        if($_FILES['foto']['name']){
            $erro_foto = false;
        } else {
            $erro_foto = true;
        };

        //salvando foto
        if($_FILES['foto']['error']==0){
            $nomeFoto = $_FILES['foto']['name'];
            $tmpFoto = $_FILES['foto']['tmp_name'];
            $urlFoto = './fotos_produtos/' . $nomeFoto;
            

            move_uploaded_file($tmpFoto, $urlFoto);
        };

        function getProdutos(){
            $produtoJson = file_get_contents('./basedados/produtoscadastrados.json');
            return json_decode($produtoJson, true);
        };

        $novoProduto = [
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'preco' => $_POST['preco'],
            'descricao' => $_POST['descricao'],
            'foto' => $urlFoto
          ];

        function editProduto($novoProduto) {
            $produtos = getProdutos();
            foreach($produtos as $index => $produto) {
              if ($produto['id'] == $novoProduto['id']) {
                $produtos[$index] = $novoProduto;
            
                $json_produtos = json_encode($produtos);
                return file_put_contents('./basedados/produtoscadastrados.json', $json_produtos);
              }
            }
            return false;
          }

          
      $editou = editProduto($novoProduto);
      if ($editou){
        header('Location: indexProdutos.php');
      };
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- inserindo o bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Editar produto</title>
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
    <div class="container">
        <div class="row my-4">
            <spam><h2>Editar produto</h2></spam>
        </div>

        <form method="post" enctype="multipart/form-data">

                <div class="col-md-6 mt-2">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control">

                    <?php if($erro_nome) : ?>
                        <div class="alert alert-danger mt-3">Campo obrigatório</div>
                    <?php endif ; ?>			
                </div>

                <div class="col-md-6 mt-2">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" class="form-control"></textarea>
                </div>
                
                <div class="col-md-6 mt-2">
                    <label for="preco">Preço</label>
                    <input id="preco" type="text" name="preco" class="form-control">
                   
                    <?php if($erro_numero) : ?>
                        <div class="alert alert-danger mt-3">Digite numero válido!</div>
                    <?php endif ; ?>

                </div>

                <div class="col-4 mt-4">
                    <div class="custom-file">
                        <input name="foto" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Selecione a foto do produto</label>
                        <?php if($erro_foto) : ?>
                            <div class="alert alert-danger mt-3">Campo obrigatório</div>
                        <?php endif ; ?>
                    </div>
                </div>			
                <div class="col-6">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <button type="submit" class="btn btn-primary float-right w-15 mt-2">Editar</button>
                </div>

            </form>
        </main>
    
    </div>

    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
</body>
</html>