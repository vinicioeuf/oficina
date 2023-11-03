<?php

session_start();
require('conexao.php');
require('registroDao.php');

$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

$usu = new registroDao();    
$usuLogado = $usu->login($email, $senha);   

if ($usuLogado) { 
        $_SESSION ['nome'] = $usuLogado['nome'];
        $_SESSION ['sobrenome'] = $usuLogado['sobrenome'];
        $_SESSION['email'] = $email;
        $_SESSION['idUser'] = $usuLogado['id'];
        
        header('Location: oficina.php');
  }
else{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
   echo "<script>window.alert('Não há usuarios cadastrados com as credenciais informadas!')
   window.location.href='login.php';</script>";
}





?>