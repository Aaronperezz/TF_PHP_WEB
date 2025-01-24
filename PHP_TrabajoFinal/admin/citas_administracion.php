<?php
include '../includes/header.php';
include '../includes/db_connection.php';


if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['crear_cita'])) {
        $idUser = $_POST['idUser'];
        $fecha_cita = $_POST['fecha_cita'];
        $motivo_cita = $_POST['motivo_cita'];

        $sql = "INSERT INTO citas (idUser, fecha_cita, motivo_cita) VALUES ('$idUser', '$fecha_cita', '$motivo_cita')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Cita creada correctamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al crear la cita: " . $conn->error . "</div>";
        }
    } elseif (isset($_POST['modificar_cita'])) {
        $idCita = $_POST['idCita'];
        $fecha_cita = $_POST['fecha_cita'];
        $motivo_cita = $_POST['motivo_cita'];

        $sql = "UPDATE citas SET fecha_cita='$fecha_cita', motivo_cita='$motivo_cita' WHERE idCita='$idCita'";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Cita modificada correctamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al modificar la cita: " . $conn->error . "</div>";
        }
    } elseif (isset($_POST['borrar_cita'])) {
        $idCita = $_POST['idCita'];

        $sql = "DELETE FROM citas WHERE idCita='$idCita'";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Cita borrada correctamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al borrar la cita: " . $conn->error . "</div>";
        }
    }
}

// Mostrar citas de todos los usuarios
$sql = "SELECT c.*, u.nombre, u.apellidos FROM citas c JOIN users_data u ON c.idUser = u.idUser";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Administración de Citaciones</h1>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='card mb-4'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>Usuario: " . $row['nombre'] . " " . $row['apellidos'] . "</h5>";
            echo "<p class='card-text'><strong>Fecha:</strong> " . $row['fecha_cita'] . "</p>";
            echo "<p class='card-text'><strong>Motivo:</strong> " . $row['motivo_cita'] . "</p>";
            // Formulario para modificar citas
            echo "<form action='citas_administracion.php' method='post' class='mb-2'>";
            echo "<input type='hidden' name='idCita' value='" . $row['idCita'] . "'>";
            echo "<div class='mb-3'>";
            echo "<label for='fecha_cita' class='form-label'>Fecha de la Cita</label>";
            echo "<input type='date' class='form-control' name='fecha_cita' value='" . $row['fecha_cita'] . "' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='motivo_cita' class='form-label'>Motivo de la Cita</label>";
            echo "<textarea class='form-control' name='motivo_cita' required>" . $row['motivo_cita'] . "</textarea>";
            echo "</div>";
            echo "<button type='submit' name='modificar_cita' class='btn btn-primary'>Modificar</button>";
            echo "</form>";
            // Formulario para borrar citas
            echo "<form action='citas_administracion.php' method='post'>";
            echo "<input type='hidden' name='idCita' value='" . $row['idCita'] . "'>";
            echo "<button type='submit' name='borrar_cita' class='btn btn-danger'>Borrar</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-info' role='alert'>No hay citas planificadas.</div>";
    }
    ?>

    <h2 class="text-center mb-4">Crear Nueva Cita</h2>
    <form action="citas_administracion.php" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="idUser" class="form-label">Usuario</label>
            <select class="form-select" id="idUser" name="idUser" required>
                <?php
                $sql = "SELECT idUser, nombre, apellidos FROM users_data";
                $users = $conn->query($sql);
                if ($users->num_rows > 0) {
                    while($user = $users->fetch_assoc()) {
                        echo "<option value='" . $user['idUser'] . "'>" . $user['nombre'] . " " . $user['apellidos'] . "</option>";
                    }
                }
                ?>
            </select>
            <div class="invalid-feedback">Por favor, seleccione un usuario.</div>
        </div>
        <div class="mb-3">
            <label for="fecha_cita" class="form-label">Fecha de la Cita</label>
            <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required>
            <div class="invalid-feedback">Por favor, ingrese la fecha de la cita.</div>
        </div>
        <div class="mb-3">
            <label for="motivo_cita" class="form-label">Motivo de la Cita</label>
            <textarea class="form-control" id="motivo_cita" name="motivo_cita" placeholder="Motivo de la cita" required></textarea>
            <div class="invalid-feedback">Por favor, ingrese el motivo de la cita.</div>
        </div>
        <button type="submit" name="crear_cita" class="btn btn-primary mb-5">Crear Cita</button>
    </form>
</div>

<?php
$conn->close();
include '../includes/footer.php';
?>