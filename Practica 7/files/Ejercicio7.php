<?php
session_start();
require_once("conexion.php");
mysqli_select_db($link, "Compras");

if (isset($_REQUEST)) {
    extract($_REQUEST);
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$accion = isset($accion) ? $accion : '';

if ($accion === 'agregar' && isset($id)) {
    $idProd = (int)$id;
    $sql = "SELECT id, producto, precio FROM `catalogo` WHERE id = $idProd";
    $res = mysqli_query($link, $sql);
    if ($res && mysqli_num_rows($res) > 0) {
        $prod = mysqli_fetch_assoc($res);
        if (isset($_SESSION['carrito'][$idProd])) {
            $_SESSION['carrito'][$idProd]['cantidad'] += 1;
        } else {
            $_SESSION['carrito'][$idProd] = [
                'id' => $prod['id'],
                'producto' => $prod['producto'],
                'precio' => (float)$prod['precio'],
                'cantidad' => 1
            ];
        }
    }
} elseif ($accion === 'quitar' && isset($id)) {
    $idProd = (int)$id;
    if (isset($_SESSION['carrito'][$idProd])) {
        if ($_SESSION['carrito'][$idProd]['cantidad'] > 1) {
            $_SESSION['carrito'][$idProd]['cantidad'] -= 1;
        } else {
            unset($_SESSION['carrito'][$idProd]);
        }
    }
} elseif ($accion === 'vaciar') {
    $_SESSION['carrito'] = [];
}

$sqlCatalogo = "SELECT id, producto, precio FROM `catalogo`";
$resCatalogo = mysqli_query($link, $sqlCatalogo);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 7 - Carrito de Compras</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 7 - Carrito de Compras</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <h3>Catálogo de Productos</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        <?php while ($prod = mysqli_fetch_assoc($resCatalogo)): ?>
            <tr>
                <td><?php echo $prod['id']; ?></td>
                <td><?php echo htmlspecialchars($prod['producto']); ?></td>
                <td>$<?php echo number_format($prod['precio'], 2, ',', '.'); ?></td>
                <td><a href="Ejercicio7.php?accion=agregar&id=<?php echo $prod['id']; ?>">Agregar al carrito</a></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h3>Contenido del Carrito</h3>
    <?php if (empty($_SESSION['carrito'])): ?>
        <p>El carrito de compras está vacío.</p>
    <?php else: ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acción</th>
            </tr>
            <?php
            $total = 0;
            foreach ($_SESSION['carrito'] as $idItem => $item):
                $subtotal = $item['precio'] * $item['cantidad'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['producto']); ?></td>
                    <td>$<?php echo number_format($item['precio'], 2, ',', '.'); ?></td>
                    <td><?php echo $item['cantidad']; ?></td>
                    <td>$<?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                    <td><a href="Ejercicio7.php?accion=quitar&id=<?php echo $idItem; ?>">Quitar uno</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" align="right"><b>Total:</b></td>
                <td colspan="2"><b>$<?php echo number_format($total, 2, ',', '.'); ?></b></td>
            </tr>
        </table>
        <p><a href="Ejercicio7.php?accion=vaciar">Vaciar carrito</a></p>
    <?php endif; ?>
</body>
</html>
