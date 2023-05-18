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
$update_pass = @$_POST['inputPassword'];
$password = password_hash($password, PASSWORD_DEFAULT);
$zip = $_POST['inputZip'];
$address = $_POST['inputAddress'];
$number = $_POST['inputNumber'];
$complement = $_POST['inputComplement'];
$district = $_POST['inputDistrict'];
$city = $_POST['inputCity'];
$state = $_POST['inputState'];
$data_registro = date('Y-m-d H:i:s');
$status = 0;
    if($email){
        $sql = "INSERT INTO usuarios (id_user, cpf, data_nasc, idade, 
        username, email, pass_key, cellphone, telephone, address, 
        number_home, complement, district, city, state, zip, data_reg, sts) 
        VALUES(null,'" . $cpf . "', '" . $data_nasc . "','" . $idade . "',
        '" . $username. "', '" . $email ."', '" . $password . "','" . $cellphone . "',
        '" . $telephone . "','" . $address . "','" . $number . "','" . $complement . "',
        '" . $district . "','" . $city . "','" . $state . "','" . $zip . "',
        '" . $data_registro . "', '" . $status . "')";

        $result = mysqli_query($conn, $sql);
        header("Location: ../view/cadastro_func.php?login=1");
        exit;
    }else{  
        header('Location: ../login.php?Erro=2');
        exit;
    }






?>