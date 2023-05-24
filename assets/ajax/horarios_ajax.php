<?php
require_once '../../config/conexao.php';

$teste = null;
if($_POST['date'] != ''){
$teste = $_POST['date'];
}

$array_horas = array();
$sql = "SELECT hora_disp FROM agendamento WHERE data_agen = '". $teste ."'";

$hora = mysqli_query($conn, $sql);

$i = 0;
while ($horas3 = mysqli_fetch_assoc($hora)) { 
    $array_horas[$i] = $horas3['hora_disp'];
    $i++;
}

$array_horas2 = array();
$sql2 = "SELECT hora_disp FROM horarios_disp";
$result2 = mysqli_query($conn, $sql2);


while ($horas2 = mysqli_fetch_assoc($result2)) {
    if(!in_array($horas2['hora_disp'], $array_horas)){
        array_push($array_horas2, $horas2['hora_disp']);
    }
}    
$array_dados['dados'] = $array_horas2;
echo json_encode($array_dados);

?>