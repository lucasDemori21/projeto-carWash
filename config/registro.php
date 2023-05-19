<?php
session_start();
require_once "conexao.php";

$_SESSION['id'] = "";
$_SESSION['username'] = "";

if(!empty($_POST))


    $username = $_POST["userR"];
    $email = $_POST['email'];
    $password = $_POST['passwordR'];
    $sts = $_POST['sts'];
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    $data_registro = date('Y-m-d H:i:s');


    if($email){
        $sql = "INSERT INTO usuarios (id_user, username, email, pass_key, data_reg, sts) 
        VALUES(null,'".$username."','".$email."','".$hash_pass."', '".$data_registro."', '".$sts."');";
        $_SESSION['username'] = $username;
        $result = mysqli_query($conn, $sql);
        header("Location: ../login.php?login=1");
        exit;
    }else{  
        header('Location: ../login.php?Erro=2');
        exit;
    }






?>