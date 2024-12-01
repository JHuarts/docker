<?php
include 'conexion.php';

$sql = "SELECT idproyecto, nombre, caracterisitcas, imagenes FROM proyectos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4">';
        echo '    <div class="card">';
        
        // Convierte el blob de imagen en base64
        $imagenData = base64_encode($row['imagenes']);
        echo '        <img src="data:image/jpeg;base64,' . $imagenData . '" class="card-img-top" alt="' . htmlspecialchars($row['nombre']) . '">';
        
        echo '        <div class="card-body">';
        echo '            <h5 class="card-title">' . htmlspecialchars($row['nombre']) . '</h5>';
        echo '            <p class="card-text">' . htmlspecialchars($row['caracterisitcas']) . '</p>';
        echo '            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProyecto' . $row['idproyecto'] . '">Más información</button>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
} else {
    echo "No hay proyectos disponibles";
}

$conn->close();
?>