<?php
session_start();
require_once 'conexao.php';

if ($_SESSION['username'] == ''){
    header('Location: ../login.php');
}

if ($_POST) {  

    $id_user = '';
    if($_SESSION['permissao'] == 1){
        $id_user = $_POST['cliente'];
    }else{
        $id_user = $_SESSION['id'];
    }

    $model = $_POST['model'];
    $mark = $_POST['mark'];
    $year = $_POST['year'];
    $type = $_POST['type'];
    $porte = $_POST['porte'];
    $plate = $_POST['plate'];

    $sqlVerify = "SELECT placa FROM carros;";

    $plate_v = mysqli_query($conn, $sqlVerify);
    
    $verify = mysqli_fetch_array($plate_v);

    if(!in_array($plate, $verify)){       
        $sql = "INSERT INTO carros (id_car, id_user, modelo, marca, ano, tipo, porte, placa) 
        VALUES(null, '" . $id_user . "', '" . $model . "', '" . $mark . "' ,
        '" . $year . "', '" . $type . "', '" . $porte . "', '" . $plate . "');";
        $result = mysqli_query($conn, $sql);
        header('Location: ../view/cadastro_veiculo.php?status=1');
        exit;
    }else{
        header('Location: ../view/cadastro_veiculo.php?status=2');
        exit;
    }
    
}


?>