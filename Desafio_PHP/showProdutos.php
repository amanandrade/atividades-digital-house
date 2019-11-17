<?php 
    //função para pegar os arquivos do produtoscadastrados.json
    function getProdutos(){
        $produtosJson = file_get_contents("./basedados/produtoscadastrados.json");
        return json_decode($produtosJson, true);
    };
    $getprodutos = getProdutos();

    echo('<pre>');
    print_r($getprodutos);
    echo('</pre>');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- inserindo o bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Mostrar produto</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <span><h2>Lista de produtos</h2></span>
        </div>
        <div class="row justify-content-center my-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= $getprodutos[4]['foto']?>" alt="Imagem foto do produto">  
                <div class="card-body">
                    <h5 class="card-title"><?= $getprodutos[4]['nome']?></h5>
                    <p class="card-text"><?= $getprodutos[4]['descricao']?></p>
                    <div class="row justify-content-around">
                        <a href="./editProduto.php" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Excluir</a>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</body>
</html>