<?php
session_start();
// Configurações do banco de dados
require('conexao.php');

try {
    // Conexão com o banco de dados
    $con = Conexao::getInstance();
    // Consulta para obter os produtos
    $query = "SELECT * FROM produtos";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);


   
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor= $_POST['valor'];

    $sqlUpdate = "UPDATE produtos SET nome = '$nome', valor = '$valor' 
WHERE id = '$id'";

    $result = $con->query($sqlUpdate);

    header('Location: oficina.php');
} else{
    header('Location: oficina.php');
}
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
}