<?php
$conn = mysqli_connect('localhost', 'root', '');
if($conn){
    //echo "conected";
}else{
    echo ("erro ao conectar");
}
mysqli_select_db($conn, "carwash");
?>