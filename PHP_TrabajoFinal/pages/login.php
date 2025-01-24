<?php
include '../includes/header.php'; 
include '../includes/db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Consulta para obtener el usuario y la contraseña
    $sql = "SELECT users_login.idUser, users_login.password, users_login.rol, users_data.nombre 
            FROM users_login 
            JOIN users_data ON users_login.idUser = users_data.idUser 
            WHERE users_login.usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $row['password'])) {
            // Iniciar sesión
            session_start();
            $_SESSION['idUser'] = $row['idUser'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['rol'] = $row['rol'];
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>Contraseña incorrecta</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>Usuario no encontrado</div>";
    }

    $conn->close();
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4" >Login</h1>
    <form action="login.php" method="post" class="needs-validation" novalidate>
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
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
    <p class="mt-3 mb-5 text-center">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
</div>
<?php include '../includes/footer.php'; ?>