<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web</title>
    <!-- cdn boostrap  css -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- link iconos boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <!-- link estilos css  -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
     <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo_transparente_blanco_ADM.png" alt="Alpha Digital Media" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noticias.php">Noticias</a>
                    </li>
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'user'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="citaciones.php">Citaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                        </li>
                    <?php elseif (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/usuarios_administracion.php">Usuarios Administración</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/citas_administracion.php">Citas Administración</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/noticias_administracion.php">Noticias Administración</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/perfil.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/logout.php">Cerrar Sesión</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="registro.php">Registro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>