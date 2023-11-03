<?php
include_once 'conexao.php';

class registroDao
{
    private $con;

    function login($email, $senha)
    {
        $con = Conexao::getInstance();
        
       
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

        $stmt = $con->prepare($sql);

        $stmt->execute();



        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    function senha($email)
    {
        
        $con = Conexao::getInstance();
        
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";

        $stmt = $con->prepare($sql);

        $stmt->execute();
    

        if ($stmt->rowCount() == 1) {

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
   

    
    
    function registrar($nome, $sobrenome, $email, $senhaSafe)
    {

        try {
            
            $con = Conexao::getInstance();
            $sql = "SELECT * FROM usuarios WHERE email='$email'";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            

            if ($stmt->rowCount() > 0) {
                return false;
            } else {

                $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES ('$nome','$sobrenome','$email','$senhaSafe')";

                $stmt = $con->prepare($sql);
                $stmt->execute();

                return true;
            }
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }
    function validarEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
            echo "<script>window.alert('Email certo')
            window.location.href='index.php';</script>";
        }
        else {
            return false;
            echo "<script>window.alert('Email inválido')
            window.location.href='index.php';</script>";
        }
    }

}
?>