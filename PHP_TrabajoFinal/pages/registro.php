<?php include '../includes/header.php'; 
include '../includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $sexo = $_POST['sexo'];
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = $_POST['rol']; // Nuevo campo de rol

    // Iniciar una transacción
    $conn->begin_transaction();

    try {
        // Insertar datos en la tabla users_data
        $sql1 = "INSERT INTO users_data (nombre, apellidos, email, telefono, fecha_nacimiento, direccion, sexo) 
                 VALUES ('$nombre', '$apellidos', '$email', '$telefono', '$fecha_nacimiento', '$direccion', '$sexo')";
        $conn->query($sql1);

        // Obtener el idUser recién insertado
        $idUser = $conn->insert_id;

        // Insertar datos en la tabla users_login
        $sql2 = "INSERT INTO users_login (idUser, usuario, password, rol) 
                 VALUES ('$idUser', '$usuario', '$password', '$rol')";	
        $conn->query($sql2);

        // Confirmar la transacción
        $conn->commit();
        echo "Registro exitoso";
    } catch (mysqli_sql_exception $exception) {
        // Revertir la transacción en caso de error
        $conn->rollback();
        echo "Error: " . $exception->getMessage();
    }

    $conn->close();
}
?>
<div class="container mt-5">
    <h1 class="text-center" >Registro</h1>
    <form action="registro.php" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
            <div class="invalid-feedback">Por favor, ingrese sus apellidos.</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <div class="invalid-feedback">Por favor, ingrese un email válido.</div>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
            <div class="invalid-feedback">Por favor, ingrese su teléfono.</div>
        </div>
        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
            <div class="invalid-feedback">Por favor, ingrese su fecha de nacimiento.</div>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" id="sexo" name="sexo" required>
                <option value="">Seleccione...</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
            <div class="invalid-feedback">Por favor, seleccione su sexo.</div>
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
            <div class="invalid-feedback">Por favor, ingrese su usuario.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
            <div class="invalid-feedback">Por favor, ingrese su contraseña.</div>
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" id="rol" name="rol" required>
                <option value="">Seleccione...</option>
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
            <div class="invalid-feedback">Por favor, seleccione un rol.</div>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
    <p class="mt-3 text-center">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</div>
<?php include '../includes/footer.php'; ?>