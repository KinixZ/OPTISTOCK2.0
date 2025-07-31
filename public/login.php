<?php
require_once '../src/db.php';
$mensaje = '';
$exito = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param('ss', $input, $input);
    $stmt->execute();
    $stmt->bind_result($hash);
    if ($stmt->fetch() && password_verify($password, $hash)) {
        $mensaje = 'Inicio de sesión exitoso.';
        $exito = true;
    } else {
        $mensaje = 'Credenciales incorrectas.';
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: auto; padding-top: 50px; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input { padding: 8px; }
        button { margin-top: 20px; padding: 10px; background-color: #4CAF50; color: white; border: none; }
        .mensaje { margin-top: 20px; padding: 10px; border-radius: 4px; }
        .exito { background-color: #d4edda; color: #155724; }
        .error { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <?php
        if ($mensaje) {
            $clase = $exito ? 'mensaje exito' : 'mensaje error';
            echo '<p class="' . $clase . '">' . htmlspecialchars($mensaje) . '</p>';
        }
    ?>
    <form method="post" action="">
        <label for="email">Correo electrónico o usuario</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Ingresar</button>
    </form>

    <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
</body>
</html>
