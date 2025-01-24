<?php
include '../includes/header.php';
include '../includes/db_connection.php';

if (!isset($_SESSION['idUser'])) {
    header("Location: login.php");
    exit();
}

$idUser = $_SESSION['idUser'];

// Obtener la información del usuario
$sql = "SELECT * FROM users_data WHERE idUser = '$idUser'";
$result = $conn->query($sql);
$userData = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $sexo = $_POST['sexo'];

    // Actualizar los datos del usuario
    $sql = "UPDATE users_data SET nombre='$nombre', apellidos='$apellidos', email='$email', telefono='$telefono', fecha_nacimiento='$fecha_nacimiento', direccion='$direccion', sexo='$sexo' WHERE idUser='$idUser'";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Datos actualizados correctamente</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error al actualizar los datos: " . $conn->error . "</div>";
    }
}

$conn->close();
?>

<div class="container mt-5">
    <h1>Perfil de Usuario</h1>
    <div class="card mb-4">
        <div class="card-header">
            Información del Usuario
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> <?php echo $userData['nombre']; ?></p>
            <p><strong>Apellidos:</strong> <?php echo $userData['apellidos']; ?></p>
            <p><strong>Email:</strong> <?php echo $userData['email']; ?></p>
            <p><strong>Teléfono:</strong> <?php echo $userData['telefono']; ?></p>
            <p><strong>Fecha de Nacimiento:</strong> <?php echo $userData['fecha_nacimiento']; ?></p>
            <p><strong>Dirección:</strong> <?php echo $userData['direccion']; ?></p>
            <p><strong>Sexo:</strong> <?php echo $userData['sexo']; ?></p>
        </div>
    </div>

    <h2 class="text-center mb-4" >Actualizar Datos</h2>
    <form action="perfil.php" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $userData['nombre']; ?>" required>
            <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $userData['apellidos']; ?>" required>
            <div class="invalid-feedback">Por favor, ingrese sus apellidos.</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>" required>
            <div class="invalid-feedback">Por favor, ingrese un email válido.</div>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $userData['telefono']; ?>" required>
            <div class="invalid-feedback">Por favor, ingrese su teléfono.</div>
        </div>
        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $userData['fecha_nacimiento']; ?>" required>
            <div class="invalid-feedback">Por favor, ingrese su fecha de nacimiento.</div>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $userData['direccion']; ?>">
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" id="sexo" name="sexo" required>
                <option value="">Seleccione...</option>
                <option value="Masculino" <?php if ($userData['sexo'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                <option value="Femenino" <?php if ($userData['sexo'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                <option value="Otro" <?php if ($userData['sexo'] == 'Otro') echo 'selected'; ?>>Otro</option>
            </select>
            <div class="invalid-feedback">Por favor, seleccione su sexo.</div>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Actualizar Datos</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>