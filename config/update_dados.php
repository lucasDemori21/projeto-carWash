'<?php
session_start();
require_once "conexao.php";

if(!$_SESSION['username']){
    $status = 1;
    header('Location: ../login.php?Erro='. $status);
    exit;
}

$id_user = $_SESSION['id'];

    $email = $_POST['inputEmail'];
    $username = $_POST['inputUser'];
    $update_pass = @$_POST['inputPassword'];
    $update_pass2 = @$_POST['inputPassword2'];
    $address = $_POST['inputAddress'];
    $number = $_POST['inputNumber'];
    $district = $_POST['inputDistrict'];
    $complement = $_POST['inputComplement'];
    $telephone = $_POST['inputTelephone'];
    $cellphone = $_POST['inputCellphone'];
    $city = $_POST['inputCity'];
    $state = $_POST['inputState'];
    $zip = $_POST['inputZip'];


if(!isset($email)){
    $sql = " UPDATE usuarios
    SET email = '" . $username . "' 
    WHERE id_user = " . $id_user . " ";
    }
    
if ($username != '') {
    $sql = " UPDATE usuarios
    SET username = '" . $username . "' 
    WHERE id_user = " . $id_user . " ";
    mysqli_query($conn, $sql);
}
/*
if(!isset($update_pass)){
    if ($update_pass == $update_pass2){
        $password = password_hash($update_pass, PASSWORD_DEFAULT);
        $sql = " UPDATE usuarios SET pass_key = '" . $password . "' WHERE id_user = '" . $id_user . "'";
        mysqli_query($conn, $sql);
        echo $sql;
        echo '<br>';
    }
}
*/
if ($address != ''){
    $sql = " UPDATE usuarios
    SET address = '" . $address . "' 
    WHERE id_user = " . $id_user . " ";
    mysqli_query($conn, $sql);
}
if ($number != ''){
    $sql = " UPDATE usuarios
    SET number_home = '" . $number . "' 
    WHERE id_user = " . $id_user . " ";
    mysqli_query($conn, $sql);
}
if ($district != ''){
    $sql = " UPDATE usuarios
    SET district = '" . $district . "' 
    WHERE id_user = " . $id_user . " ";
    mysqli_query($conn, $sql);
}
if ($complement != ''){
    $sql = " UPDATE usuarios
    SET complement = '" . $complement . "' 
    WHERE id_user = " . $id_user . " ";
    mysqli_query($conn, $sql);
}
if ($telephone != ''){
    $sql = " UPDATE usuarios
    SET telephone = '" . $telephone . "' 
    WHERE id_user = " . $id_user . " ";
    mysqli_query($conn, $sql);
}
if ($cellphone != ''){
    $sql = " UPDATE usuarios
    SET cellphone = '" . $cellphone . "' 
    WHERE id_user = " . $id_user . " ";
    mysqli_query($conn, $sql);
}
if ($city != ''){
    $sql = " UPDATE usuarios
    SET city = '" . $city . "' 
    WHERE id_user = " . $id_user . " ";
    mysqli_query($conn, $sql);
}
if ($state != ''){
    $sql = " UPDATE usuarios
    SET state = '" . $state . "' 
    WHERE id_user = " . $id_user . " ";
    mysqli_query($conn, $sql);
}
if ($zip != ''){
    $sql = " UPDATE usuarios
    SET zip = '" . $zip . "' 
    WHERE id_user = " . $id_user . " ";
    mysqli_query($conn, $sql);
}

header('Location: ../view/perfil.php?update=1');
exit;
?>