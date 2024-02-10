<?php

$db = new PDO('mysql:host=localhost;dbname=villes_tests', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM blog WHERE bg_validate = 1 ORDER BY bg_id DESC"; 
$stmt = $db->query($query);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blog.css">
    <title>FORO</title>
</head>
<body>
    <header>
        <h1>FORO</h1>
        <nav>
            <ul>
                <li><a href="index.php">Admin</a></li>
                <li><a href="messageForm.php">Publicar</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <p><strong>Pseudónimo:</strong> <?php echo $post['bg_pseudo']; ?></p>
                <p><strong>Comentario:</strong> <?php echo $post['bg_commentaire']; ?></p>
                <p><strong>Fecha:</strong> <?php echo $post['bg_date']; ?></p>

               
                <form action="submit_response.php" method="post">
    <input type="hidden" name="parent_id" value="<?php echo $post['bg_id']; ?>">
    <input type="text" name="pseudo" placeholder="Tu pseudónimo">
    <textarea name="comment" placeholder="Escribe tu comentario"></textarea>
    <button type="submit">Responder</button>
</form>


                
                <?php
                $parentId = $post['bg_id'];
                $query = "SELECT * FROM respuestas WHERE gb_id_publicacion = :parent_id";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
                $stmt->execute();
                $responses = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($responses)) {
                    echo '<ul class="responses">';
                    foreach ($responses as $response) {
                        echo '<li>';
                        echo '<p><strong>Pseudónimo:</strong> ' . $response['gb_pseudo'] . '</p>';
                        echo '<p><strong>Comentario:</strong> ' . $response['gb_comentario'] . '</p>';
                        echo '<p><strong>Fecha:</strong> ' . $response['gb_fecha'] . '</p>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>
        <?php endforeach; ?>
    </main>

    <footer>
        
    </footer>
</body>
</html>
