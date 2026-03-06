
<?php require 'config.php'; ?>

<h2>Carrito de Compras</h2>

<table border="1">
<tr>
<th>Producto</th>
<th>Precio</th>
<th>Cantidad</th>
<th>Subtotal</th>
<th>Accion</th>
</tr>

<?php
$total = 0;

foreach($_SESSION['cart'] as $id=>$qty){

$stmt = $pdo->prepare("SELECT * FROM productos WHERE id=?");
$stmt->execute([$id]);
$p = $stmt->fetch(PDO::FETCH_ASSOC);

$sub = $p['precio'] * $qty;
$total += $sub;
?>

<tr>
<td><?php echo $p['nombre']; ?></td>
<td><?php echo $p['precio']; ?></td>
<td><?php echo $qty; ?></td>
<td><?php echo $sub; ?></td>
<td>
<a href="remove.php?id=<?php echo $id; ?>">Eliminar</a>
</td>
</tr>

<?php } ?>

<tr>
<td colspan="3">TOTAL</td>
<td><?php echo $total; ?></td>
<td></td>
</tr>
</table>

<br>
<a href="clear.php">Vaciar carrito</a>
<br><br>
<a href="index.php">Volver al catalogo</a>
