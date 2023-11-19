<?php
session_start();
// Configurações do banco de dados
require('conexao.php');

try {
    // Conexão com o banco de dados
    $con = Conexao::getInstance();
    $id = $_GET['id'];

    $sqlDeletar = "DELETE FROM produtos WHERE id = '$id'";

    $con->query($sqlDeletar);

    header('Location: oficina.php');
}catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
}