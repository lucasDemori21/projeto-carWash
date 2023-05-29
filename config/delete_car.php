<?php
require_once 'conexao.php';

$delete = '';
if($_GET['delete'] != ''){
    $delete = $_GET['delete'];
}

$sql = 'DELETE FROM carros WHERE id_car = "' . $delete . '"';

if($result = mysqli_query($conn, $sql)){
    header('Location: ../view/cadastro_veiculo.php?status=3');
    exit;
}

?>