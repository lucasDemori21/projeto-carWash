<?php
session_start();
require_once "conexao.php";

$_SESSION['username'] = "";
$_SESSION['id'] = "";

$user = $_POST['userLogin'];
$password = $_POST['passwordLogin'];

$sql = "SELECT * FROM usuarios
WHERE email = '" . $user . "';";

$result = mysqli_query($conn, $sql);
$verifica = mysqli_fetch_array($result);

if (!empty($verifica) && ($verifica[17] == 0)) {
    echo 'entrou user';
    if ($verifica[5] == $user) {
        if (password_verify($password, $verifica[6])) {
            $_SESSION['id'] = $verifica[0];
            $_SESSION['permissao'] = $verifica2[17];
            $_SESSION['username'] = $verifica[4];
            header('Location: ../view/home.php?login=2');
        } else {
            $erro = 1;
            header('Location: ../login.php?Erro=' . $erro);
            exit;
        }
    } 
}

$sql2 = "SELECT * FROM funcionarios
WHERE email = '" . $user . "';";
$result2 = mysqli_query($conn, $sql2);
$verifica2 = mysqli_fetch_array($result2);

if ($verifica2[18] == 1) {
    if ($verifica2[2] == $user) {
        if (password_verify($password, $verifica2[8])) {
            $_SESSION['id'] = $verifica2[0];
            $_SESSION['permissao'] = $verifica2[18];
            $_SESSION['username'] = $verifica2[1] . " Admin";
            header('Location: ../index.php?login=2');
        } else {
            echo '2';
            $erro = 1;
            header('Location: ../login.php?Erro=' . $erro);
            exit;
        }
    } else {
        echo '3';
        $erro = 3;
        header('Location: ../login.php?Erro=' . $erro);
        exit;
    }
}

?>