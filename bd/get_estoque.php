<?php
// Include the database configuration file
include 'config.php';

// SQL query to retrieve inventory data
$sql = "SELECT * FROM estoque";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $estoque = array();

    while ($row = $result->fetch_assoc()) {
        $estoque[] = array(
            'id' => $row['id'],
            'produto' => $row['produto'],
            'categoria' => $row['categoria'],
            'quantidade' => $row['quantidade'],
            'compradas' => $row['compradas'],
            'vendidas' => $row['vendidas']
        );
    }

    // Set the response content type
    header('Content-Type: application/json');
    echo json_encode($estoque);
} else {
    // Return an empty array
    header('Content-Type: application/json');
    echo json_encode(array());
}

// Close the database connection
$conn->close();
?>
