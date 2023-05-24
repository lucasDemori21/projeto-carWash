<?php
session_start();
require_once "conexao.php";

if(!empty($_POST))

$email = $_POST['inputEmail'];
$username = $_POST['inputUser'];
$cpf = $_POST['cpf'];
$data_nasc = $_POST['dateN'];
$idade = $_POST['idade'];
$cellphone = $_POST['inputCellphone'];
$telephone = $_POST['inputTelephone'];
$password = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
$zip = $_POST['inputZip'];
$address = $_POST['inputAddress'];
$number = $_POST['inputNumber'];
$complement = $_POST['inputComplement'];
$district = $_POST['inputDistrict'];
$city = $_POST['inputCity'];
$state = $_POST['inputState'];
$data_registro = date('Y-m-d H:i:s');
$status = 0;


$sqlVerifica = "SELECT email FROM usuarios;";
$query = mysqli_query($conn, $sqlVerifica);
while($verifica_user = mysqli_fetch_array($query)){
        if(in_array($email, $verifica_user)){
            $email = '';
        }
}

$sqlVerificaF = "SELECT email FROM funcionarios;";
$queryF = mysqli_query($conn, $sqlVerificaF);
while($verifica_func = mysqli_fetch_array($queryF)){
        if(in_array($email, $verifica_func)){
            $email = '';
        }
}


    if($email != ''){
        $sql = "INSERT INTO usuarios (id_user, cpf, data_nasc, idade, 
        username, email, pass_key, cellphone, telephone, address, 
        number_home, complement, district, city, state, zip, data_reg, sts) 
        VALUES(null,'" . $cpf . "', '" . $data_nasc . "','" . $idade . "',
        '" . $username. "', '" . $email ."', '" . $password . "','" . $cellphone . "',
        '" . $telephone . "','" . $address . "','" . $number . "','" . $complement . "',
        '" . $district . "','" . $city . "','" . $state . "','" . $zip . "',
        '" . $data_registro . "', '" . $status . "')";

        $result = mysqli_query($conn, $sql);
        header("Location: ../view/cadastro_cliente.php?cadastro=1");
        echo $sql;
        exit;
    }else{  
        header("Location: ../view/cadastro_cliente.php?cadastro=2");
        exit;
    }

?>