<?php 
session_start();
require_once 'conexao.php';

if($_POST){
    $id_user = '';
    if($_SESSION['permissao'] == 1){
        $id_user = $_POST['cliente'];
    }else{
        $id_user = $_SESSION['id'];
    }
    echo 'TESTE: '.$id_user;

    $func = $_POST['func'];
    $carro = $_POST['carro'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $servico = $_POST['servico'];
    $status = $_POST['status'];
    $verify = array();
    
    $sqlVerify = "SELECT data_agen, hora_disp FROM agendamento";
    $resultVerify = mysqli_query($conn, $sqlVerify);
    

    while($verify = mysqli_fetch_array($resultVerify)){
        if(($verify[0] == $data) && ($verify[1] == $hora)){
            header('Location: ../view/agendamento.php?disponivel=2');        
            exit;
        }
    }
    $sql = "INSERT INTO agendamento(id_agendamento, id_user,id_car, id_func, id_servico, data_agen, hora_disp, status) VALUES
            (null, '" . $id_user . "', '" . $carro . "', '" . $func . "', '" . $servico . "', '" . $data . "', '" . $hora . "', " . $status . ");";
    $result = mysqli_query($conn, $sql);
    header('Location: ../view/agendamento.php?disponivel=1'); 
    exit;
}
