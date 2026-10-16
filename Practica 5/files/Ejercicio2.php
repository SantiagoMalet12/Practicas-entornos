<?php
$emailWebmaster = "webmaster@misitio.com";
$mensajeEstado = "";
$errores = [];

$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
$motivo = isset($_POST['motivo']) ? trim($_POST['motivo']) : 'General';
$mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($nombre)) {
        $errores[] = "Debe ingresar su nombre completo.";
    }
    if (empty($email)) {
        $errores[] = "Debe ingresar su correo electrónico.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }
    if (empty($mensaje)) {
        $errores[] = "Debe ingresar el mensaje de la consulta.";
    }

    if (empty($errores)) {
        $asunto = "Consulta al Webmaster: $motivo - de $nombre";
        $cuerpoHTML = "<h3>Nueva consulta de contacto</h3>" .
                      "<p><b>Nombre:</b> " . htmlspecialchars($nombre) . "<br>" .
                      "<b>Email:</b> " . htmlspecialchars($email) . "<br>" .
                      "<b>Teléfono:</b> " . htmlspecialchars($telefono) . "<br>" .
                      "<b>Motivo:</b> " . htmlspecialchars($motivo) . "</p>" .
                      "<p><b>Mensaje:</b><br>" . nl2br(htmlspecialchars($mensaje)) . "</p>";

        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";

        $resultado = @mail($emailWebmaster, $asunto, $cuerpoHTML, $headers);

        if ($resultado) {
            $mensajeEstado = "Su consulta fue enviada exitosamente al webmaster.";
        } else {
            $mensajeEstado = "Se procesó la consulta y se ejecutó la función mail(). (En servidores locales sin SMTP configurado en php.ini no se completa la entrega física).";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 2 - Contacto al Webmaster</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 2 - Formulario de Contacto al Webmaster</h2>
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
                <td>Nombre Completo:</td>
                <td><input type="text" name="nombre" size="30" required value="<?php echo htmlspecialchars($nombre); ?>"></td>
            </tr>
            <tr>
                <td>Correo Electrónico:</td>
                <td><input type="email" name="email" size="30" required value="<?php echo htmlspecialchars($email); ?>"></td>
            </tr>
            <tr>
                <td>Teléfono:</td>
                <td><input type="text" name="telefono" size="20" value="<?php echo htmlspecialchars($telefono); ?>"></td>
            </tr>
            <tr>
                <td>Motivo:</td>
                <td>
                    <select name="motivo">
                        <option value="General" <?php if ($motivo === 'General') echo 'selected'; ?>>General</option>
                        <option value="Soporte" <?php if ($motivo === 'Soporte') echo 'selected'; ?>>Soporte</option>
                        <option value="Comercial" <?php if ($motivo === 'Comercial') echo 'selected'; ?>>Comercial</option>
                        <option value="Sugerencia" <?php if ($motivo === 'Sugerencia') echo 'selected'; ?>>Sugerencia</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top">Mensaje:</td>
                <td><textarea name="mensaje" rows="6" cols="40" required><?php echo htmlspecialchars($mensaje); ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Enviar Consulta"></td>
            </tr>
        </table>
    </form>
</body>
</html>
