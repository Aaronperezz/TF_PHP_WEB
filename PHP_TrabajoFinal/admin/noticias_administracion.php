<?php
include '../includes/header.php';
include '../includes/db_connection.php';


if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['crear_noticia'])) {
        $titulo = $_POST['titulo'];
        $fecha = $_POST['fecha'];
        $texto = $_POST['texto'];
        $imagen = $_POST['imagen'];
        $idUser = $_SESSION['idUser'];

        $sql = "INSERT INTO noticias (titulo, fecha, texto, imagen, idUser) VALUES ('$titulo', '$fecha', '$texto', '$imagen', '$idUser')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Noticia creada correctamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al crear la noticia: " . $conn->error . "</div>";
        }
    } elseif (isset($_POST['modificar_noticia'])) {
        $idNoticia = $_POST['idNoticia'];
        $titulo = $_POST['titulo'];
        $fecha = $_POST['fecha'];
        $texto = $_POST['texto'];
        $imagen = $_POST['imagen'];

        $sql = "UPDATE noticias SET titulo='$titulo', fecha='$fecha', texto='$texto', imagen='$imagen' WHERE idNoticia='$idNoticia'";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Noticia modificada correctamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al modificar la noticia: " . $conn->error . "</div>";
        }
    } elseif (isset($_POST['borrar_noticia'])) {
        $idNoticia = $_POST['idNoticia'];

        $sql = "DELETE FROM noticias WHERE idNoticia='$idNoticia'";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Noticia borrada correctamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al borrar la noticia: " . $conn->error . "</div>";
        }
    }
}

// Mostrar noticias
$sql = "SELECT * FROM noticias";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Administración de Noticias</h1>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='card mb-4'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>Título: " . $row['titulo'] . "</h5>";
            echo "<p class='card-text'><strong>Fecha:</strong> " . $row['fecha'] . "</p>";
            echo "<p class='card-text'><strong>Texto:</strong> " . $row['texto'] . "</p>";
            if ($row['imagen']) {
                echo "<p class='card-text'><strong>Imagen:</strong> <img src='" . $row['imagen'] . "' class='img-fluid' alt='Imagen de la noticia'></p>";
            }
            // Formulario para modificar noticias
            echo "<form action='noticias_administracion.php' method='post' class='mb-2'>";
            echo "<input type='hidden' name='idNoticia' value='" . $row['idNoticia'] . "'>";
            echo "<div class='mb-3'>";
            echo "<label for='titulo' class='form-label'>Título</label>";
            echo "<input type='text' class='form-control' name='titulo' value='" . $row['titulo'] . "' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='fecha' class='form-label'>Fecha</label>";
            echo "<input type='date' class='form-control' name='fecha' value='" . $row['fecha'] . "' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='texto' class='form-label'>Texto</label>";
            echo "<textarea class='form-control' name='texto' required>" . $row['texto'] . "</textarea>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='imagen' class='form-label'>Imagen</label>";
            echo "<input type='text' class='form-control' name='imagen' value='" . $row['imagen'] . "' required>";
            echo "</div>";
            echo "<button type='submit' name='modificar_noticia' class='btn btn-primary'>Modificar</button>";
            echo "</form>";
            // Formulario para borrar noticias
            echo "<form action='noticias_administracion.php' method='post'>";
            echo "<input type='hidden' name='idNoticia' value='" . $row['idNoticia'] . "'>";
            echo "<button type='submit' name='borrar_noticia' class='btn btn-danger'>Borrar</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-info' role='alert'>No hay noticias disponibles.</div>";
    }
    ?>

    <h2 class="text-center mb-4">Crear Nueva Noticia</h2>
    <form action="noticias_administracion.php" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" required>
            <div class="invalid-feedback">Por favor, ingrese el título.</div>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
            <div class="invalid-feedback">Por favor, ingrese la fecha.</div>
        </div>
        <div class="mb-3">
            <label for="texto" class="form-label">Texto</label>
            <textarea class="form-control" id="texto" name="texto" placeholder="Texto" required></textarea>
            <div class="invalid-feedback">Por favor, ingrese el texto.</div>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (URL)</label>
            <input type="text" class="form-control" id="imagen" name="imagen" placeholder="URL de la imagen" required>
            <div class="invalid-feedback">Por favor, ingrese la URL de la imagen.</div>
        </div>
        <button type="submit" name="crear_noticia" class="btn btn-primary">Crear Noticia</button>
    </form>
</div>

<?php
$conn->close();
include '../includes/footer.php';
?>