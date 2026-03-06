
<?php
function conectar(){
    $host="localhost";
    $db="tienda";
    $user="root";
    $pass="";

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }catch(PDOException $e){
        die("Error de conexion: ".$e->getMessage());
    }
}

function iniciarSesion(){
    if(session_status()===PHP_SESSION_NONE){
        session_start();
    }
}

function cerrarSesion(){
    session_unset();
    session_destroy();
}

function enlace($link,$msg){
    return "<a href='$link'>$msg</a>";
}
?>
