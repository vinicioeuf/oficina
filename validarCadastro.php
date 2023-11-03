
<?php
session_start();
include('conexao.php');
include('registroDao.php');


if (isset($_POST['submit'])) {
  $nome = addslashes($_POST['nome']);
  $sobrenome = addslashes($_POST['sobrenome']);
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);
  $confirmaSenha = addslashes($_POST['confirmaSenha']);

  if($senha!=$confirmaSenha){
    echo "<script>window.alert('Ops! Digite senhas iguais...')
    window.location.href='cadastro.php';</script>";
    exit;
  } 
    // $senhaSafe = password_hash($senha, PASSWORD_DEFAULT);
      
      $verEmail = new registroDao();
      $registroDao = new registroDao();

      if($verEmail->validarEmail($email) == true){//Verificação básica de email, ainda incoerente. mesmo colocando um domínio errado continua registrando, por exemplo: 123@aluno.if-sertao.edu.br está errado mas mesmo assim está cadastrando
        $registroDao->registrar($nome, $sobrenome, $email, $senha);
        echo "<script>window.alert('Cadastro realizado')
      window.location.href='login.php';</script>";
      }else{
        echo "<script>window.alert('Email inválido, verifique suas credenciais.')</script>";
      }
}
?>