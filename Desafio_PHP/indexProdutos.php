<?php 
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
    <div class="container mt-4">
    <span><h2>Lista de produtos</h2></span>
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
                        <td><?= $produto['id'] ?>id</td>
                        <td><?= $produto['nome'] ?></td>
                        <td><?= $produto['descricao'] ?></td>
                        <td>R$ <?= $produto['preco'] ?></td>
                        <td class="d-flex justify-content-center"><a href="showProdutos.php"><i class="material-icons" style="font-size: 30px">pageview</i></a></th>
                    </tr>
                <?php }; ?>
            </tbody>

        </table>
    </div>
</body>
</html>