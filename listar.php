<?php
require_once 'config/conexion.php';

try {
    $stmt = $pdo->query("SELECT id, nombre, email, telefono, categoria, estado, fecha_creacion FROM registros ORDER BY fecha_creacion DESC");
    $registros = $stmt->fetchAll();
} catch (\PDOException $e) {
    error_log("Error al consultar registros: " . $e->getMessage());
    $registros = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Registros — AI3</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Registros Almacenados</h1>
            <p>Salidas sanitizadas con htmlspecialchars() para prevenir Scripting entre Sitios (XSS)</p>
            <nav class="nav-links">
                <a href="index.php">Formulario de Registro</a>
                <a href="listar.php">Ver Registros Almacenados</a>
            </nav>
        </header>

        <main class="card">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th>Fecha de Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($registros) > 0): ?>
                            <?php foreach ($registros as $reg): ?>
                                <tr>
                                    <td><?= htmlspecialchars($reg['id'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($reg['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($reg['email'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($reg['telefono'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($reg['categoria'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><span class="badge"><?= htmlspecialchars($reg['estado'], ENT_QUOTES, 'UTF-8') ?></span></td>
                                    <td><?= htmlspecialchars($reg['fecha_creacion'], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" style="text-align: center; color: #64748b;">No hay registros almacenados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>

        <footer>
            <p>Dennis Romero Cabrera &copy; 2026 — Programación de Sistemas Web (ECOTEC)</p>
        </footer>
    </div>
</body>
</html>