<?php
$mensajeEstado = "";
$destinatario = isset($_POST['destinatario']) ? trim($_POST['destinatario']) : "destinatario@ejemplo.com";
$asunto = isset($_POST['asunto']) ? trim($_POST['asunto']) : "Prueba de Correo HTML";
$remitente = isset($_POST['remitente']) ? trim($_POST['remitente']) : "remitente@misitio.com";
$cuerpoHTML = isset($_POST['cuerpo_html']) ? $_POST['cuerpo_html'] : "<h1>Bienvenido a Nuestro Sitio</h1><p>Este es un correo con formato <b>HTML</b> enviado mediante la funcion mail() de PHP.</p><p><a href='http://localhost/'>Visitar Sitio Web</a></p>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($destinatario) || empty($asunto) || empty($cuerpoHTML)) {
        $mensajeEstado = "Por favor, complete todos los campos obligatorios.";
    } elseif (!filter_var($destinatario, FILTER_VALIDATE_EMAIL)) {
        $mensajeEstado = "La dirección de correo destinatario no es válida.";
    } else {
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        if (!empty($remitente)) {
            $headers .= "From: " . $remitente . "\r\n";
            $headers .= "Reply-To: " . $remitente . "\r\n";
        }

        $resultado = @mail($destinatario, $asunto, $cuerpoHTML, $headers);

        if ($resultado) {
            $mensajeEstado = "El correo con formato HTML fue enviado exitosamente a " . htmlspecialchars($destinatario);
        } else {
            $mensajeEstado = "La función mail() fue ejecutada pero no se pudo enviar el correo.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 1 - Correo HTML</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 1 - Envío de correo con formato HTML</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <?php if (!empty($mensajeEstado)): ?>
        <p><strong><?php echo $mensajeEstado; ?></strong></p>
    <?php endif; ?>

    <form method="POST" action="">
        <table border="0" cellpadding="5">
            <tr>
                <td>Destinatario:</td>
                <td><input type="email" name="destinatario" size="40" required value="<?php echo htmlspecialchars($destinatario); ?>"></td>
            </tr>
            <tr>
                <td>Asunto:</td>
                <td><input type="text" name="asunto" size="40" required value="<?php echo htmlspecialchars($asunto); ?>"></td>
            </tr>
            <tr>
                <td>Remitente:</td>
                <td><input type="email" name="remitente" size="40" value="<?php echo htmlspecialchars($remitente); ?>"></td>
            </tr>
            <tr>
                <td valign="top">Cuerpo (HTML):</td>
                <td><textarea name="cuerpo_html" rows="8" cols="50" required><?php echo htmlspecialchars($cuerpoHTML); ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Enviar Correo HTML"></td>
            </tr>
        </table>
    </form>
</body>
</html>
