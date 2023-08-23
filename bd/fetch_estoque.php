<?php
include_once 'config.php';

$columns = array('id', 'produto', 'categoria', 'quantidade', 'compradas', 'vendidas', '');

$query = "SELECT * FROM estoque ";

if (isset($_POST['search']['value'])) {
    $query .= 'WHERE produto LIKE "%' . $_POST['search']['value'] . '%" ';
}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order'][0]['column']] . ' ' . $_POST['order'][0]['dir'] . ' ';
} else {
    $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if ($_POST['length'] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $conn->prepare($query);
$statement->execute();
$number_filter_row = $statement->rowCount();
$statement = $conn->prepare($query . $query1);
$statement->execute();
$result = $statement->fetchAll();
$data = array();

foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row['id'];
    $sub_array[] = $row['produto'];
    $sub_array[] = $row['categoria'];
    $sub_array[] = $row['quantidade'];
    $sub_array[] = $row['compradas'];
    $sub_array[] = $row['vendidas'];
    $sub_array[] = '<button type="button" class="btn btn-warning btn-xs update" id="' . $row['id'] . '"><i class="fas fa-edit"></i></button>&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs delete" id="' . $row['id'] . '"><i class="fas fa-trash"></i></button>';
    $data[] = $sub_array;
}

function get_all_data($conn)
{
    $query = "SELECT * FROM estoque";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data($conn),
    "recordsFiltered" => $number_filter_row,
    "data" => $data
);

echo json_encode($output);
?>
