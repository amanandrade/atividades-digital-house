<?php 
   $erro_user = false;
   $erro_mail = false;
   $erro_senha = false;
   $erro_confirm_senha = false;

   if($_POST){
        //validação de erro de preenchimento do nome do usuario
        if(empty($_POST['nome'])){
            $erro_user = true;
        };
        //validação de erro de preenchimento de e-mail
        if(empty($_POST['email'])){
            $erro_mail = true;
        };
        //validação de erro de preenchimento de senha
        if (strlen($_POST['senha']) < 6) {
            return $erro_senha = true;
        };
        //validação de erro de confirmação de senha
        if(($_POST['senha']) !== ($_POST['confirmSenha'])){
            return $erro_confirm_senha = true;
        }; 

   };
?>