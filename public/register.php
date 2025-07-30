<?php
require_once '../src/db.php';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if ($password === $confirm) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $username, $email, $hashed);
        if ($stmt->execute()) {
            $mensaje = 'Usuario registrado correctamente.';
        } else {
            $mensaje = 'Error al registrar: ' . $conn->error;
        }
        $stmt->close();
    } else {
        $mensaje = 'Las contraseñas no coinciden.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: auto; padding-top: 50px; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input { padding: 8px; }
        button { margin-top: 20px; padding: 10px; background-color: #4CAF50; color: white; border: none; }
        .mensaje { margin-top: 20px; color: red; }
    </style>
</head>
<body>
    <h1>Registrarse</h1>
    <?php if ($mensaje) echo '<p class="mensaje">' . htmlspecialchars($mensaje) . '</p>'; ?>
    <form method="post" action="">
        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm">Confirmar contraseña</label>
        <input type="password" id="confirm" name="confirm" required>

        <button type="submit">Registrarme</button>
    </form>
</body>
</html>
