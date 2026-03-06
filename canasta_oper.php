
<?php
require "Recursos.php";
iniciarSesion();

$oper = $_GET['oper'];

if($oper=="T"){
    $_SESSION['carrito'] = [];
}

if($oper=="A"){

$id = $_GET['art'];
unset($_SESSION['carrito'][$id]);

}

header("Location: canastaagregar.php");
?>
