<?php
// Inclua o arquivo de configuração do banco de dados
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);

    $produto = $data['produto'];
    $categoria = $data['categoria'];
    $quantidade = $data['quantidade'];
    $compradas = 0; // Initialize to zero
    $vendidas = 0; // Initialize to zero

    $sql = "INSERT INTO estoque (usuario_id, produto, categoria, quantidade, compradas, vendidas) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssii", $usuario_id, $produto, $categoria, $quantidade, $compradas, $vendidas);

    $usuario_id = 1; // Substitua pelo ID do usuário logado

    if ($stmt->execute()) {
        echo json_encode(array('message' => 'Item adicionado com sucesso.'));
    } else {
        echo json_encode(array('message' => 'Erro ao adicionar o item: ' . $conn->error));
    }

    $stmt->close();
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
