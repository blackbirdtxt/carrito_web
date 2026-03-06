
<?php
require "Recursos.php";
iniciarSesion();
$pdo = conectar();

if(isset($_POST['item'])){

$item = $_POST['item'];
$cantidad = intval($_POST['cantidad']);

if(isset($_SESSION['carrito'][$item])){
    $_SESSION['carrito'][$item] += $cantidad;
}else{
    $_SESSION['carrito'][$item] = $cantidad;
}

}

?>

<html>

<head>
<meta charset="utf-8">
<title>Carrito</title>
</head>

<body style="font-family:Tahoma;">

<center>
<h2>Carrito de Compras</h2>
</center>

<table border="1" align="center" width="700">

<tr bgcolor="navy">
<th><font color="white">Articulo</font></th>
<th><font color="white">Cantidad</font></th>
<th><font color="white">Precio</font></th>
<th><font color="white">Subtotal</font></th>
<th><font color="white">Accion</font></th>
</tr>

<?php

$total = 0;

foreach($_SESSION['carrito'] as $id=>$cantidad){

$stmt=$pdo->prepare("SELECT * FROM articulo WHERE cod_articulo=?");
$stmt->execute([$id]);
$p=$stmt->fetch(PDO::FETCH_ASSOC);

$subtotal = $p['precio'] * $cantidad;
$total += $subtotal;

?>

<tr>

<td><?php echo $p['articulo']; ?></td>

<td><?php echo $cantidad; ?></td>

<td><?php echo $p['precio']; ?></td>

<td><?php echo $subtotal; ?></td>

<td>
<a href="canasta_oper.php?oper=A&art=<?php echo $id; ?>">Eliminar</a>
</td>

</tr>

<?php } ?>

<tr bgcolor="yellow">

<td colspan="3">TOTAL</td>

<td><?php echo $total; ?></td>

<td></td>

</tr>

</table>

<br>

<center>

<a href="catalogo.php">Agregar Articulo</a> |
<a href="canasta_oper.php?oper=T">Vaciar Carrito</a>

</center>

</body>

</html>
