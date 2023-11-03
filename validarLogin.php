<?php

session_start();
require('conexao.php');
require('registroDao.php');

$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

$usu = new registroDao();    

$senhacorreta= $usu->senha($email);

if(password_verify($senha,$senhacorreta['senha'])){ ///erro se nao colocar email valido
    $usuLogado = $usu->login($email, $senhacorreta['senha']);   
    if ($usuLogado) { 
        $_SESSION ['nome'] = $usuLogado['nome'];
        $_SESSION ['sobrenome'] = $usuLogado['sobrenome'];
        $_SESSION['email'] = $email;
        $_SESSION['idUser'] = $usuLogado['id'];
        
        header('Location: login.php');
         
        }
}else{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
   echo "<script>window.alert('Não há usuarios cadastrados com as credenciais informadas!')
   window.location.href='login.php';</script>";
}





?>