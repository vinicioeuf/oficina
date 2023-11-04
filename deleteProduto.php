<?php
// Inclua o arquivo com o código de conexão com o banco de dados
require_once 'conexao.php';

// Verifica se o ID do produto está presente na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Obtém o ID do produto a partir da URL
    $productId = $_GET['id'];

    try {
        // Prepara a declaração SQL para excluir o produto com o ID informado
        $con = Conexao::getInstance();
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $con->prepare($sql);

        // Vincula o ID do produto ao parâmetro da declaração SQL
        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);

        // Executa a declaração SQL para excluir o produto
        $stmt->execute();

        // Redireciona o usuário de volta à página original após a exclusão bem-sucedida
        header('Location: oficina.php');
        exit;
    } catch (PDOException $e) {
        // Trata quaisquer erros que ocorram durante o processo de exclusão
        // Você pode exibir uma mensagem de erro ou registrar o erro para fins de depuração
        echo "Erro: " . $e->getMessage();
    }
} else {
    // Se o ID do produto não estiver presente na URL ou não for um valor numérico, redireciona de volta à página original
    header('Location: oficina.php');
    exit;
}
?>
