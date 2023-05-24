<?php
    session_start();
    require_once "conexao.php";

    if (!$_SESSION['username']) {
        $status = 1;
        header('Location: ../login.php?Erro=' . $status);
        exit;
    }
    
    $id_user = $_SESSION['id'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['dateN'];
    $idade = $_POST['idade'];
    $address = $_POST['inputAddress'];
    $district = $_POST['inputDistrict'];
    $complement = $_POST['inputComplement'];
    $city = $_POST['inputCity'];
    $state = $_POST['inputState'];
    $email = $_POST['inputEmail'];
    $username = $_POST['inputUser'];
    $update_pass = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
    $number = $_POST['inputNumber'];
    $telephone = $_POST['inputTelephone'];
    $cellphone = $_POST['inputCellphone'];
    $zip = $_POST['inputZip'];

    if ($cpf != '') {
        $sql = " UPDATE usuarios
    SET cpf = '" . $cpf . "' 
    WHERE id_user = " . $id_user . " ";  
    mysqli_query($conn, $sql);
    }

    if ($data_nasc != '') {
        $sql = " UPDATE usuarios
    SET data_nasc = '" . $data_nasc . "' 
    WHERE id_user = " . $id_user . " ";  
    mysqli_query($conn, $sql);
    }

    if ($idade != '') {
        $sql = " UPDATE usuarios
    SET idade = '" . $idade . "' 
    WHERE id_user = " . $id_user . " "; 
    mysqli_query($conn, $sql); 
    }

    if ($email != '') {
        $sql = " UPDATE usuarios
    SET email = '" . $username . "' 
    WHERE id_user = " . $id_user . " ";  
    mysqli_query($conn, $sql);
    }

    if ($username != '') {
        $sql = " UPDATE usuarios
    SET username = '" . $username . "' 
    WHERE id_user = " . $id_user . " ";
        mysqli_query($conn, $sql);
    }
    
    if($update_pass != ''){
        $sql = " UPDATE usuarios
    SET pass_key = '" . $update_pass . "' 
    WHERE id_user = " . $id_user . " ";
        mysqli_query($conn, $sql);
    }

    if ($address != '') {
        $sql = " UPDATE usuarios
    SET address = '" . $address . "' 
    WHERE id_user = " . $id_user . " ";
      
    mysqli_query($conn, $sql);

    }
    if ($number != '') {
        $sql = " UPDATE usuarios
    SET number_home = '" . $number . "' 
    WHERE id_user = " . $id_user . " ";
    echo $sql; 
    mysqli_query($conn, $sql);
    }
    if ($district != '') {
        $sql = " UPDATE usuarios
    SET district = '" . $district . "' 
    WHERE id_user = " . $id_user . " ";  
    mysqli_query($conn, $sql);
    }
    if ($complement != '') {
        $sql = " UPDATE usuarios
    SET complement = '" . $complement . "' 
    WHERE id_user = " . $id_user . " ";  
    mysqli_query($conn, $sql);
    }
    if ($telephone != '') {
        $sql = " UPDATE usuarios
    SET telephone = '" . $telephone . "' 
    WHERE id_user = " . $id_user . " ";
    echo $sql; 
    mysqli_query($conn, $sql);
    }
    if ($cellphone != '') {
        $sql = " UPDATE usuarios
    SET cellphone = '" . $cellphone . "' 
    WHERE id_user = " . $id_user . " ";
    echo $sql; 
    mysqli_query($conn, $sql);
    }
    if ($city != '') {
        $sql = " UPDATE usuarios
    SET city = '" . $city . "' 
    WHERE id_user = " . $id_user . " ";  
    mysqli_query($conn, $sql);
    }
    if ($state != '') {
        $sql = " UPDATE usuarios
    SET state = '" . $state . "' 
    WHERE id_user = " . $id_user . " ";  
    mysqli_query($conn, $sql);
    }
    if ($zip != '') {
        $sql = " UPDATE usuarios
    SET zip = '" . $zip . "' 
    WHERE id_user = " . $id_user . " ";  
    mysqli_query($conn, $sql);
    }
    
    header('Location: ../view/perfil.php?update=1');
    exit;
    ?>