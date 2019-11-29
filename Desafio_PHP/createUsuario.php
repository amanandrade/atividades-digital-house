<?php 
    include('validacoesUsuario.php');
    include('userFunction.php');

    //criando array de usuários após as validações
    if($_POST){
        //se não tiver nenhum erro:
        if (empty($erro_user) && 
            empty($erro_mail) && 
            empty($erro_senha) && 
            empty($erro_confirm_senha)
            )
            {
                //crie um array de usuário e senha
                $usuario = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
                ];
                //chamando a função de criação de usuário
            };
            $salvou = storeUser($usuario);

            if ($salvou){
                return header('Location: showUsuarios.php');
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
    <title>Novo usuário</title>
</head>
<body>
    <main class="container mt-5">
        <form method="post" enctype="multipart/form-data">

            <div class="col-md-6 mt-2">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control">

                <?php if($erro_user) : ?>
                    <div class="alert alert-danger mt-3">Campo obrigatório</div>
                <?php endif ; ?>			
            </div>

            <div class="col-md-6 mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <?php if($erro_mail) : ?>
                    <div class="alert alert-danger mt-3">Campo obrigatório</div>
                <?php endif ; ?>
            </div>
            
            <div class="col-md-6 mt-2">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control">
                <?php if($erro_senha) : ?>
                    <div class="alert alert-danger mt-3">A senha deve ter no mínimo 6 caracteres</div>
                <?php endif ; ?>
            </div>

            <div class="col-md-6 mt-2">
                <label for="senha">Confirmar senha</label>
                <input type="password" name="confirmSenha" id="senha" class="form-control">
                <?php if($erro_confirm_senha) : ?>
                    <div class="alert alert-danger mt-3">Senha não confere</div>
                <?php endif ; ?>
            </div>
        
            <div class="col-6">
                <button type="submit" class="btn btn-primary float-right w-15 mt-2">Enviar</button>
            </div>

        </form>
    </main>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
</body>
</html>