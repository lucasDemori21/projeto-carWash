<?php
$conn = mysqli_connect('localhost', 'root', '');
if($conn){
    //echo "conected";
}else{
    echo ("Erro ao conectar!");
}
mysqli_select_db($conn, "carwash");
?>