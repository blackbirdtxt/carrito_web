
<?php
require 'config.php';

$id = $_POST['id'];
$qty = $_POST['qty'];

if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id] += $qty;
}else{
    $_SESSION['cart'][$id] = $qty;
}

echo "Producto agregado al carrito";
?>
