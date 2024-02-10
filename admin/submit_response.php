<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST['pseudo'], $_POST['comment'], $_POST['parent_id'])) {
        $pseudo = $_POST['pseudo'];
        $comment = $_POST['comment'];
        $parentId = $_POST['parent_id'];

        try {
            
            $db = new PDO('mysql:host=localhost;dbname=villes_tests', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $query = "INSERT INTO respuestas (gb_pseudo, gb_comentario, gb_id_publicacion, gb_fecha) 
                      VALUES (:pseudo, :comment, :parent_id, NOW())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':parent_id', $parentId, PDO::PARAM_INT);

           
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
?>
