<?php
session_start();
require_once 'conexao.php';

if ($_SESSION['username'] == ''){
    header('Location: ../login.php;');
}

if ($_POST) {  

    $id_user = $_POST['cliente'];
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
        $sql = "INSERT INTO carros (id_user, modelo, marca, ano, tipo, porte, placa) 
        VALUES('" . $id_user . "', '" . $model . "', '" . $mark . "' ,
        '" . $year . "', '" . $type . "', '" . $porte . "', '" . $plate . "');";
        $result = mysqli_query($conn, $sql);
        header('Location: ../view/config.php?status=1');
        exit;
    }else{
        header('Location: ../view/config.php?status=2');
        exit;
    }
    
}


?>