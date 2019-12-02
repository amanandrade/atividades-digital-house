<?php 
    define('USERJSON','./basedados/userdatabase.json');

    //pegando usuários cadastrados no arquivo json e transformando em arrayphp
    function getUser(){
        $json_usuarios = file_get_contents(USERJSON);
        return json_decode($json_usuarios, true);
    };

    //armazenando usuários e criando ID
    function storeUser($usuario){
        $usuarios = getUser();

        if (empty($usuarios)){
            //pega o array de usuários criado na página createUsuario
            $usuarios = [];
            //cria a posição ID
            $usuario['id'] = 1;
            } else {
            //cria looping para demais IDs
            $usuario['id'] = ++end($usuarios)['id'];    
        }
        //acrescenta ID no final do array
        array_push($usuarios, $usuario);

        //codifica de novo o arrayphp para json e salva no arquivo json
        $json_usuarios = json_encode($usuarios);
        return file_put_contents(USERJSON, $json_usuarios);
    };

    //pesquisar usuário para deletar
    function searchUser($id) {
        $usuarios = getProdutos();
        foreach($usuarios as $usuario)
          if ($usuario['id'] == $id)
            return $usuario;
        
        return false;
    };
    
    //excluindo usuário
    function deleteUsuario($id) {
        $usuarios = getUser();
        foreach($usuarios as $index => $usuario)
          if ($usuario['id'] == $id) {
            array_splice($usuarios, $index, 1);
            $json_usuarios = json_encode($usuarios);
            return file_put_contents(USERJSON, $json_usuarios);
          }
        
        return false;
      };

    //editando usuário
    function editUser($edicao) {
      $usuarios = getUser();
      foreach($usuarios as $index => $usuario) {
        if ($usuario['id'] == $edicao['id']) {
          $usuarios[$index] = $edicao;
      
          $json_usuarios = json_encode($usuarios);
          return file_put_contents(USERJSON, $json_usuarios);
        }
      }
      return false;
    };

    //pesquisando usuário para confirmar login
    function pesquisaUsuario($email, $senha){
      $usuarios = getUser();
      foreach($usuarios as $usuario) {
        if ($usuario['email'] == $email 
        && password_verify($senha, $usuario['senha'])) {
          return $usuario;
        }   
      }
      return false;
    };



?>