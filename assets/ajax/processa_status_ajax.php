<?php
require_once '../../config/conexao.php';

if ((!empty($_POST['status'])) && (!empty($_POST['status']))) {
    $id_agen = $_POST['id_agen'];
    $status = $_POST['status'];
    $sql = "UPDATE agendamento
            SET status = ". $status . "
            WHERE id_agendamento = '". $id_agen ."'";
    $result = mysqli_query($conn, $sql);
    //echo $sql;
    echo json_encode($return);
}

?>
