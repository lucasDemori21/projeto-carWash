<?php
require_once 'conexao.php';

$delete = '';
if($_GET['delete'] != ''){
    $delete = $_GET['delete'];
}

$sql = 'DELETE FROM agendamento WHERE id_agendamento = "' . $delete . '"';

if($result = mysqli_query($conn, $sql)){
    header('Location: ../view/agendamento.php');
}

?>