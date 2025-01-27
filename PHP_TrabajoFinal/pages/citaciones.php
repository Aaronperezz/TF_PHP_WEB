<?php
include '../includes/header.php';
include '../includes/db_connection.php';

if (!isset($_SESSION['idUser'])) {
    header("Location: login.php");
    exit();
}

$idUser = $_SESSION['idUser'];

// Mostrar citas del usuario
$sql = "SELECT * FROM citas WHERE idUser = $idUser";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Mis Citaciones</h1>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>Fecha: " . $row['fecha_cita'] . "</h5>";
            echo "<p class='card-text'>Motivo: " . $row['motivo_cita'] . "</p>";
            // Formulario para modificar citas
            echo "<form action='citaciones.php' method='post' class='mb-2'>";
            echo "<input type='hidden' name='idCita' value='" . $row['idCita'] . "'>";
            echo "<div class='mb-3'>";
            echo "<label for='fecha_cita' class='form-label'>Fecha de la Cita</label>";
            echo "<input type='date' class='form-control' name='fecha_cita' value='" . $row['fecha_cita'] . "' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='motivo_cita' class='form-label'>Motivo de la Cita</label>";
            echo "<textarea class='form-control' name='motivo_cita' required>" . $row['motivo_cita'] . "</textarea>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary'>Modificar</button>";
            echo "</form>";
            // Formulario para borrar citas
            echo "<form action='borrar_cita.php' method='post'>";
            echo "<input type='hidden' name='idCita' value='" . $row['idCita'] . "'>";
            echo "<button type='submit' class='btn btn-danger'>Borrar</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-info' role='alert'>No tienes citas planificadas.</div>";
    }
    ?>

    <h2 class="text-center mb-4">Solicitar Nueva Cita</h2>
    <form action="citaciones.php" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="fecha_cita" class="form-label">Fecha de la Cita</label>
            <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required>
            <div class="invalid-feedback">Por favor, ingrese la fecha de la cita.</div>
        </div>
        <div class="mb-3">
            <label for="motivo_cita" class="form-label">Motivo de la Cita</label>
            <textarea class="form-control" id="motivo_cita" name="motivo_cita" required></textarea>
            <div class="invalid-feedback">Por favor, ingrese el motivo de la cita.</div>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Solicitar Cita</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>