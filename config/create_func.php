<?php
session_start();
require_once "conexao.php";

if(!$_SESSION['username']){
    $status = 1;
    header('Location: ../login.php?Erro='. $status);
    exit;
}

$email = $_POST['inputEmail'];
$username = $_POST['inputUser'];
$cpf = $_POST['cpf'];
$data_nasc = $_POST['dateN'];
$idade = $_POST['idade'];
$cellphone = $_POST['inputCellphone'];
$telephone = $_POST['inputTelephone'];
$update_pass = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
$address = $_POST['inputAddress'];
$number = $_POST['inputNumber'];
$district = $_POST['inputDistrict'];
$city = $_POST['inputCity'];
$state = $_POST['inputState'];
$zip = $_POST['inputZip'];
$funcao = $_POST['inputFunc'];
$salario = str_replace(".", "", $_POST['inputSalario']);
$salario = str_replace(",", ".", $salario);
$permissao = $_POST['permissao'];
$data_emissao = date('Y-m-d');
$sts = $_POST['sts'];

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

    $sql = "INSERT INTO funcionarios(
    id_func, nome_func, email, data_nasc, idade,
    cpf, funcao, salario, senha, cep, endereco, number_home,
    celular, telefone, bairro, cidade, estado, data_emissao, permissao, sts)
    VALUES (null, '".$username."', '".$email."',
    '".$data_nasc."', '".$idade."', '".$cpf."',
    '".$funcao."', '".$salario."', '".$update_pass."',
    '".$zip."', '".$address."', '".$number."', '".$cellphone."', '".$telephone."',
    '".$district."', '".$city."', '".$state."',
    '".$data_emissao."', '".$permissao."', '".$sts."')";
     
    if($result = mysqli_query($conn, $sql)){
        header('Location: ../view/cadastro_func.php?Status=1');
    }
        
}
        
        
        
        
        