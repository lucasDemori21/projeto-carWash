<?php

require_once '../../config/conexao.php';

$id_cliente = null;
if($_GET['cliente'] != ''){
    $id_cliente = $_GET['cliente'];
}

$array_carros = array();
$i = 0;
$sql = "SELECT id_car, modelo, ano, tipo, placa FROM carros
WHERE id_user = '" . $id_cliente . "'";
$result_car = mysqli_query($conn, $sql);
while ($car = mysqli_fetch_assoc($result_car)) {
    $array_carros[$i]['id'] = $car['id_car'];
    $array_carros[$i]['modelo'] = $car['modelo'];
    $array_carros[$i]['ano'] = $car['ano'];
    $array_carros[$i]['tipo'] = $car['tipo'];
    $array_carros[$i]['placa'] = $car['placa'];
    $i++;
}

$array_dados['carros'] = $array_carros;
echo json_encode($array_dados);

?>