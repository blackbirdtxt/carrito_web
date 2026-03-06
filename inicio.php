
<?php
require "Recursos.php";
iniciarSesion();

if(!isset($_POST['mail']) || !isset($_POST['nombres'])){
    header("Location: inicio.html");
    exit;
}

$mail = $_POST['mail'];
$nombres = $_POST['nombres'];

$pdo = conectar();

$sql = "SELECT * FROM cliente WHERE mail=? AND nombres=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$mail,$nombres]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$cliente){
    header("Location: error.html");
    exit;
}

$_SESSION['mail']=$cliente['mail'];
$_SESSION['nombres']=$cliente['nombres'];

if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito']=[];
}

header("Location: catalogo.php");
?>
