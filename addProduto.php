<?php
// Configurações do banco de dados
require('conexao.php');
try {
    // Conexão com o banco de dados
    $con = Conexao::getInstance();
    $nome = addslashes($_POST['nome']);
    $valor = addslashes($_POST['valor']);
        

                // Insere o produto no banco de dados
                $sql = "INSERT INTO produtos (nome, valor) VALUES (:nome, :valor)";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':valor', $valor);
                $stmt->execute();

  

    // Redireciona de volta para a página inicial
    header('Location: tables.php');
    exit();
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
}
?>