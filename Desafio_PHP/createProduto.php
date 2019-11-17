<?php 

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

        //salvando produtos no json, restringindo o form pelos campos de imput
        $produtoJson = file_get_contents('./basedados/produtoscadastrados.json');
        $arrayProdutos = json_decode($produtoJson, true);
        $novoProduto = ['nome' => $_POST['nome'], 'descricao' => $_POST['descricao'], 'preco' => $_POST['preco'], 'foto' => $urlFoto];
        $arrayProdutos[] = $novoProduto;
        
        function idProduto ($novoProduto){
            if (empty($novoProduto)) {
                $arrayProdutos['id'] = 1;
              } else {
                $arrayProdutos['id'] = ++end($arrayProdutos)['id'];    
              }; 
            
              array_push($novoProduto, $arrayProdutos['id']);
        };
        
        $novoProdutoJson = json_encode($arrayProdutos);
        $salvouProduto = file_put_contents('./basedados/produtoscadastrados.json', $novoProdutoJson);
        if ($salvouProduto) {
            header('Location: indexProdutos.php');
        };
        
        //criando um id
  
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
    <title>Cadastro de produto</title>
</head>
<body>
    <main class="container mt-5">
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
                    <button type="submit" class="btn btn-primary float-right w-15 mt-2">Enviar</button>
                </div>

            </form>
        </main>
        
    </body>
</html>