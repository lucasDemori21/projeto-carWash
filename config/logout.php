<?php
session_start();
session_destroy();
$status = 2;
header('Location: ../login.php?Status=' . $status);
?>