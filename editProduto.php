<?php
session_start();
// Configurações do banco de dados
require('conexao.php');

try {
    // Conexão com o banco de dados
    $con = Conexao::getInstance();
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $valor= $_POST['valor'];

        $sqlEditar = "UPDATE produtos SET nome = '$nome', valor = '$valor' WHERE id = '$id'";

        $con->query($sqlEditar);

        header('Location: oficina.php');
    } else{
        header('Location: oficina.php');
    }
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
}