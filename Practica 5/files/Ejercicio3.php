<?php
$mensajeEstado = "";
$errores = [];

$tuNombre = isset($_POST['tu_nombre']) ? trim($_POST['tu_nombre']) : '';
$tuEmail = isset($_POST['tu_email']) ? trim($_POST['tu_email']) : '';
$amigoNombre = isset($_POST['amigo_nombre']) ? trim($_POST['amigo_nombre']) : '';
$amigoEmail = isset($_POST['amigo_email']) ? trim($_POST['amigo_email']) : '';
$urlSitio = isset($_POST['url_sitio']) ? trim($_POST['url_sitio']) : 'http://' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost');
$mensajePersonal = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : 'Te recomiendo visitar este sitio web que me pareció muy interesante.';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($tuNombre)) {
        $errores[] = "Debe ingresar su nombre.";
    }
    if (empty($tuEmail) || !filter_var($tuEmail, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Debe ingresar un correo electrónico remitente válido.";
    }
    if (empty($amigoNombre)) {
        $errores[] = "Debe ingresar el nombre de su amigo.";
    }
    if (empty($amigoEmail) || !filter_var($amigoEmail, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Debe ingresar un correo electrónico de destinatario válido.";
    }

    if (empty($errores)) {
        $asunto = "$tuNombre te recomienda visitar este sitio web";
        $cuerpoHTML = "<h3>¡Hola, $amigoNombre!</h3>" .
                      "<p>$tuNombre ($tuEmail) te recomienda visitar el siguiente sitio web:</p>" .
                      "<p><a href='$urlSitio'>$urlSitio</a></p>" .
                      "<p><b>Mensaje:</b><br>" . nl2br(htmlspecialchars($mensajePersonal)) . "</p>";

        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: " . $tuEmail . "\r\n";
        $headers .= "Reply-To: " . $tuEmail . "\r\n";

        $resultado = @mail($amigoEmail, $asunto, $cuerpoHTML, $headers);

        if ($resultado) {
            $mensajeEstado = "La recomendación fue enviada con éxito a $amigoNombre ($amigoEmail).";
        } else {
            $mensajeEstado = "Se procesó la recomendación y se ejecutó la función mail().";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 3 - Recomendar Sitio</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 3 - Recomendar el sitio a un amigo</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <?php if (!empty($mensajeEstado)): ?>
        <p><strong><?php echo $mensajeEstado; ?></strong></p>
    <?php endif; ?>

    <?php if (!empty($errores)): ?>
        <ul>
            <?php foreach ($errores as $err): ?>
                <li><?php echo $err; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="">
        <table border="0" cellpadding="5">
            <tr>
                <td colspan="2"><b>Datos del Remitente</b></td>
            </tr>
            <tr>
                <td>Tu Nombre:</td>
                <td><input type="text" name="tu_nombre" size="30" required value="<?php echo htmlspecialchars($tuNombre); ?>"></td>
            </tr>
            <tr>
                <td>Tu Email:</td>
                <td><input type="email" name="tu_email" size="30" required value="<?php echo htmlspecialchars($tuEmail); ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><b>Datos del Amigo</b></td>
            </tr>
            <tr>
                <td>Nombre del Amigo:</td>
                <td><input type="text" name="amigo_nombre" size="30" required value="<?php echo htmlspecialchars($amigoNombre); ?>"></td>
            </tr>
            <tr>
                <td>Email del Amigo:</td>
                <td><input type="email" name="amigo_email" size="30" required value="<?php echo htmlspecialchars($amigoEmail); ?>"></td>
            </tr>
            <tr>
                <td>URL del Sitio:</td>
                <td><input type="text" name="url_sitio" size="40" value="<?php echo htmlspecialchars($urlSitio); ?>"></td>
            </tr>
            <tr>
                <td valign="top">Mensaje:</td>
                <td><textarea name="mensaje" rows="5" cols="40"><?php echo htmlspecialchars($mensajePersonal); ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Enviar Recomendación"></td>
            </tr>
        </table>
    </form>
</body>
</html>
