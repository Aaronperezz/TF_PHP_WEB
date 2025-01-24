<?php
include '../includes/header.php';
include '../includes/db_connection.php';


if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idUser'])) {
    $idUser = $_POST['idUser'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $sexo = $_POST['sexo'];
    $rol = $_POST['rol'];

    // Actualizar los datos del usuario
    $sql1 = "UPDATE users_data SET nombre='$nombre', apellidos='$apellidos', email='$email', telefono='$telefono', fecha_nacimiento='$fecha_nacimiento', direccion='$direccion', sexo='$sexo' WHERE idUser='$idUser'";
    $sql2 = "UPDATE users_login SET rol='$rol' WHERE idUser='$idUser'";

    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Datos actualizados correctamente</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error al actualizar los datos: " . $conn->error . "</div>";
    }
}

// Obtener todos los usuarios
$sql = "SELECT u.idUser, u.usuario, u.rol, d.nombre, d.apellidos, d.email, d.telefono, d.fecha_nacimiento, d.direccion, d.sexo 
        FROM users_login u 
        JOIN users_data d ON u.idUser = d.idUser";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Administración de Usuarios</h1>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='card mb-4'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>Usuario: " . $row['usuario'] . "</h5>";
            echo "<p class='card-text'><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
            echo "<p class='card-text'><strong>Apellidos:</strong> " . $row['apellidos'] . "</p>";
            echo "<p class='card-text'><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p class='card-text'><strong>Teléfono:</strong> " . $row['telefono'] . "</p>";
            echo "<p class='card-text'><strong>Fecha de Nacimiento:</strong> " . $row['fecha_nacimiento'] . "</p>";
            echo "<p class='card-text'><strong>Dirección:</strong> " . $row['direccion'] . "</p>";
            echo "<p class='card-text'><strong>Sexo:</strong> " . $row['sexo'] . "</p>";
            echo "<p class='card-text'><strong>Rol:</strong> " . $row['rol'] . "</p>";
            // Formulario para editar los datos del usuario
            echo "<form action='usuarios_administracion.php' method='post' class='mb-2'>";
            echo "<input type='hidden' name='idUser' value='" . $row['idUser'] . "'>";
            echo "<div class='mb-3'>";
            echo "<label for='nombre' class='form-label'>Nombre</label>";
            echo "<input type='text' class='form-control' name='nombre' value='" . $row['nombre'] . "' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='apellidos' class='form-label'>Apellidos</label>";
            echo "<input type='text' class='form-control' name='apellidos' value='" . $row['apellidos'] . "' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='email' class='form-label'>Email</label>";
            echo "<input type='email' class='form-control' name='email' value='" . $row['email'] . "' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='telefono' class='form-label'>Teléfono</label>";
            echo "<input type='text' class='form-control' name='telefono' value='" . $row['telefono'] . "' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='fecha_nacimiento' class='form-label'>Fecha de Nacimiento</label>";
            echo "<input type='date' class='form-control' name='fecha_nacimiento' value='" . $row['fecha_nacimiento'] . "' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='direccion' class='form-label'>Dirección</label>";
            echo "<input type='text' class='form-control' name='direccion' value='" . $row['direccion'] . "'>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='sexo' class='form-label'>Sexo</label>";
            echo "<select class='form-select' name='sexo' required>";
            echo "<option value='Masculino'" . ($row['sexo'] == 'Masculino' ? ' selected' : '') . ">Masculino</option>";
            echo "<option value='Femenino'" . ($row['sexo'] == 'Femenino' ? ' selected' : '') . ">Femenino</option>";
            echo "<option value='Otro'" . ($row['sexo'] == 'Otro' ? ' selected' : '') . ">Otro</option>";
            echo "</select>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='rol' class='form-label'>Rol</label>";
            echo "<select class='form-select' name='rol' required>";
            echo "<option value='user'" . ($row['rol'] == 'user' ? ' selected' : '') . ">User</option>";
            echo "<option value='admin'" . ($row['rol'] == 'admin' ? ' selected' : '') . ">Admin</option>";
            echo "</select>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary'>Actualizar Usuario</button>";
            echo "</form>";
            // Formulario para borrar el usuario
            echo "<form action='borrar_usuario.php' method='post'>";
            echo "<input type='hidden' name='idUser' value='" . $row['idUser'] . "'>";
            echo "<button type='submit' class='btn btn-danger'>Eliminar Usuario</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-info' role='alert'>No hay usuarios registrados.</div>";
    }
    ?>
    <h2 class="text-center mb-4">Crear Nuevo Usuario</h2>
    <form action="crear_usuario.php" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            <div class="invalid-feedback">Por favor, ingrese el nombre.</div>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
            <div class="invalid-feedback">Por favor, ingrese los apellidos.</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <div class="invalid-feedback">Por favor, ingrese un email válido.</div>
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
            <div class="invalid-feedback">Por favor, ingrese el usuario.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
            <div class="invalid-feedback">Por favor, ingrese la contraseña.</div>
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" id="rol" name="rol" required>
                <option value="">Seleccione...</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <div class="invalid-feedback">Por favor, seleccione un rol.</div>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>

<?php
$conn->close();
include '../includes/footer.php';
?>