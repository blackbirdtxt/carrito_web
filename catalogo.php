
<?php
require "Recursos.php";
iniciarSesion();
$pdo = conectar();

?>

<html>
<head>
<meta charset="utf-8">
<title>Catalogo</title>
</head>

<body style="font-family:Tahoma;">

<table width="800" align="center">
<tr bgcolor="navy">
<td align="center">
<font color="white">
Bienvenid@, <?php echo $_SESSION['nombres']; ?>
</font>
</td>
</tr>
</table>

<center><h3>Catalogo de Articulos</h3></center>

<table border="1" align="center" width="800">

<tr bgcolor="navy">
<th><font color="white">Articulo</font></th>
<th><font color="white">Precio</font></th>
<th><font color="white">Cantidad</font></th>
<th><font color="white">Comprar</font></th>
</tr>

<?php

$stmt=$pdo->query("SELECT * FROM articulo");

while($p=$stmt->fetch(PDO::FETCH_ASSOC)){
?>

<tr>

<td><?php echo $p['articulo']; ?></td>

<td><?php echo $p['precio']; ?></td>

<td>

<form method="post" action="canastaagregar.php">

<input type="number" name="cantidad" value="1" min="1">

<input type="hidden" name="item" value="<?php echo $p['cod_articulo']; ?>">

</td>

<td>

<input type="submit" value="Comprar">

</form>

</td>

</tr>

<?php } ?>

</table>

<br>

<center>

<a href="canastaagregar.php">Ver Carrito</a>

</center>

</body>

</html>
