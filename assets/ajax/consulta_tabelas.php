<?php
require_once "../../config/conexao.php";

$sql = "SELECT status FROM agendamento"; 
$result = mysqli_query($conn, $sql);

$agendados = 0;
$concluidos = 0;

while ($dados = mysqli_fetch_array($result)) {
    if($dados[0] == 0){
        $agendados += 1;
    }else{
        $concluidos += 1;
    }
}

$array_dados['agendados'] = $agendados;
$array_dados['concluidos'] = $concluidos;

echo json_encode($array_dados);

?>