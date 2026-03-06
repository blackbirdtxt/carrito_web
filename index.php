
<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Catalogo</title>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<h2>Catalogo de Productos</h2>

<div id="productos">
<?php
$stmt = $pdo->query("SELECT * FROM productos");
while($p = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
<div style="border:1px solid #000;margin:10px;padding:10px;width:200px;">
<b><?php echo $p['nombre']; ?></b><br>
Precio: <?php echo $p['precio']; ?><br>
<input type="number" value="1" min="1" id="qty_<?php echo $p['id']; ?>">
<button onclick="addCart(<?php echo $p['id']; ?>)">Agregar</button>
</div>
<?php } ?>
</div>

<a href="cart.php">Ver Carrito</a>

<script>
function addCart(id){
    let qty = $("#qty_"+id).val();
    $.post("add_to_cart.php",{id:id,qty:qty},function(data){
        alert(data);
    });
}
</script>

</body>
</html>
