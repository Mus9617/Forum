<?php

$db = new PDO('mysql:host=localhost;dbname=villes_tests', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pseudo'], $_POST['comment'], $_POST['parent_id'])) {
        $pseudo = $_POST['pseudo'];
        $comment = $_POST['comment'];
        $parentId = $_POST['parent_id'];

        try {
         
            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, "uploads/$image_name");

      
            $emoji = $_POST['emoji'];

            
            $query = "INSERT INTO respuestas (gb_pseudo, gb_comentario, gb_id_publicacion, gb_fecha, gb_image_path, gb_emoji) 
                      VALUES (:pseudo, :comment, :parent_id, NOW(), :image, :emoji)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
            $stmt->bindParam(':image', $image_name, PDO::PARAM_STR);
            $stmt->bindParam(':emoji', $emoji, PDO::PARAM_STR);

            $stmt->execute();

            header("Location: blog.php");
            exit();
        } catch (PDOException $e) {
            echo "Error al insertar datos: " . $e->getMessage();
        }
    } else {
        echo "Error: Datos incompletos.";
    }
} else {
    header("Location: blog.php");
    exit();
}

// Establecer la conexión a la base de datos
// Procesar el envío del formulario si es un POST
// Procesar la carga de imágenes
// Obtener el emoji seleccionado
 // Insertar datos en la base de datos
?>
