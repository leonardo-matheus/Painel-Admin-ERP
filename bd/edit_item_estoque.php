<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];
$novoProduto = $data['produto'];
$novaCategoria = $data['categoria'];
$novaQuantidade = $data['quantidade'];

$query = "UPDATE estoque SET produto = '$novoProduto', categoria = '$novaCategoria', quantidade = $novaQuantidade WHERE id = $id";
if ($conn->query($query) === TRUE) {
    echo json_encode(array('message' => 'Item atualizado com sucesso.'));
} else {
    echo json_encode(array('message' => 'Erro ao atualizar item: ' . $conn->error));
}
?>
