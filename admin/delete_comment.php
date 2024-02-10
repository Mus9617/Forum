<?php

if (isset($_GET['id'])) {
    $commentId = $_GET['id'];

   
    $db = new PDO('mysql:host=localhost;dbname=villes_tests', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
    $query = "DELETE FROM blog WHERE bg_id = :commentId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
    $stmt->execute();


    header("Location: manage_blog.php");
    exit();
} else {

    echo "No se proporcionó un ID de comentario.";
}
