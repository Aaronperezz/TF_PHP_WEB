<?php
if (!isset($include_only_content)) {
    include '../includes/header.php';
    

}

include '../includes/db_connection.php';

$sql = "SELECT n.titulo, n.fecha, n.texto, n.imagen, u.nombre 
        FROM noticias n 
        JOIN users_data u ON n.idUser = u.idUser";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Noticias</h1>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='card mb-4'>";
            echo "<div class='card-body'>";
            echo "<h2 class='card-title'>" . $row["titulo"] . "</h2>";
            echo "<p class='card-text'><small class='text-muted'>Publicado por " . $row["nombre"] . " el " . $row["fecha"] . "</small></p>";
            if ($row["imagen"]) {
                echo "<img src='" . $row["imagen"] . "' class='card-img-top' alt='Imagen de la noticia'>";
            }
            echo "<p class='card-text mt-3'>" . $row["texto"] . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-info' role='alert'>No hay noticias disponibles.</div>";
    }
    ?>
</div>

<?php
if (!isset($include_only_content)) {
    include '../includes/footer.php';
}
$conn->close();
?>