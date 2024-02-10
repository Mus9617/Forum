<?php

if (isset($_GET['id'])) {
    $commentId = $_GET['id'];

 
    $db = new PDO('mysql:host=localhost;dbname=villes_tests', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $query = "SELECT * FROM blog WHERE bg_id = :commentId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
    $stmt->execute();
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="editform.css">
        <title>Editar Comentaire</title>
    </head>

    <body>
        <h2>Editar Comentario</h2>
        <form action="update_comment.php" method="post">
            <input type="hidden" name="comment_id" value="<?php echo $comment['bg_id']; ?>">
            <label for="pseudo">Pseudo:</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?php echo $comment['bg_pseudo']; ?>"><br>
            <label for="comment">Comentaire:</label><br>
            <textarea id="comment" name="comment"><?php echo $comment['bg_commentaire']; ?></textarea><br>
            <input type="submit" value="Sauvrgarde le Changment">
        </form>
    </body>

    </html>
    <?php
} else {

    echo "Pas de id Propose dans les commentaires.";
}
?>


<!-- // Verification si i la reçu le commantaires
// raquette de la obtention de donnes a modifier -->
