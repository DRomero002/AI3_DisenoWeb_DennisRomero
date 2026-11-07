<?php
require_once 'config/conexion.php';

$mensaje = '';
$tipoAlert = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre    = trim($_POST['nombre'] ?? '');
    $email     = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $telefono  = trim($_POST['telefono'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');

    if (empty($nombre) || empty($email) || empty($telefono) || empty($categoria)) {
        $mensaje = "Todos los campos son obligatorios.";
        $tipoAlert = "danger";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El formato de correo electrónico no es válido.";
        $tipoAlert = "danger";
    } else {
        try {
            $sql = "INSERT INTO registros (nombre, email, telefono, categoria) VALUES (:nombre, :email, :telefono, :categoria)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':nombre'    => $nombre,
                ':email'     => $email,
                ':telefono'  => $telefono,
                ':categoria' => $categoria
            ]);

            $mensaje = "¡Registro guardado exitosamente!";
            $tipoAlert = "success";
        } catch (\PDOException $e) {
            error_log("Error al insertar registro: " . $e->getMessage());
            $mensaje = "Error al procesar la solicitud.";
            $tipoAlert = "danger";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios — AI3</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Sistema de Registro Web</h1>
            <p>Módulo seguro en PHP PDO con Sentencias Preparadas</p>
            <nav class="nav-links">
                <a href="index.php">Formulario de Registro</a>
                <a href="listar.php">Ver Registros Almacenados</a>
            </nav>
        </header>

        <main class="card">
            <?php if (!empty($mensaje)): ?>
                <div class="alert alert-<?= $tipoAlert ?>">
                    <?= $mensaje ?>
                </div>
            <?php endif; ?>

            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre Completo *</label>
                    <input type="text" id="nombre" name="nombre" required placeholder="Ej. Dennis Romero">
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico *</label>
                    <input type="email" id="email" name="email" required placeholder="ejemplo@ecotec.edu.ec">
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono *</label>
                    <input type="tel" id="telefono" name="telefono" required placeholder="0991234567">
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría *</label>
                    <select id="categoria" name="categoria" required>
                        <option value="">Seleccione una opción</option>
                        <option value="Estudiante">Estudiante</option>
                        <option value="Docente">Docente</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Externo">Externo</option>
                    </select>
                </div>

                <button type="submit">Guardar Registro</button>
            </form>
        </main>

        <footer>
            <p>Dennis Romero Cabrera &copy; 2026 — Programación de Sistemas Web (ECOTEC)</p>
        </footer>
    </div>
</body>
</html>