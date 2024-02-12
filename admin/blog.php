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
    <link rel="stylesheet" href="../assets/style/blog.css">
    <title>FORO</title>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/emoji-picker-element@3.3.1/dist/emoji-picker-element.css">
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
                <p><strong>Usuario:</strong>
                    <?php echo $post['bg_pseudo']; ?>
                </p>
                <p><strong>Comentario:</strong>
                    <?php echo $post['bg_commentaire']; ?>
                </p>
                <p><strong>Fecha:</strong>
                    <?php echo $post['bg_date']; ?>
                </p>

                <form action="submit_response.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="parent_id" value="<?php echo $post['bg_id']; ?>">
                    <input type="text" name="pseudo" placeholder="Tu pseudónimo">
                    <textarea name="comment" placeholder="Escribe tu comentario"></textarea>

                    <input type="file" name="image">

                    <input type="text" name="emoji" placeholder="Selecciona un emoji" id="emoji-input">
                    <emoji-picker for="emoji-input"></emoji-picker>
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
                        echo '<p><strong>Usuario:</strong> ' . $response['gb_pseudo'] . '</p>';
                        echo '<p><strong>Comentario:</strong> ' . $response['gb_comentario'] . '</p>';
                        echo '<p><strong>Fecha:</strong> ' . $response['gb_fecha'] . '</p>';

                        if (!empty($response['gb_image_path'])) {
                            echo '<img src="uploads/' . $response['gb_image_path'] . '" alt="Imagen de respuesta">';
                        }
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

    <script type="module"
        src="https://cdn.jsdelivr.net/npm/emoji-picker-element@3.3.1/dist/emoji-picker-element.js"></script>
</body>

</html>

<!-- // Conexión a la base de datos
// Consulta para obtener los posts
//Input para la carga de imágenes 
// Mostrar la imagen si está disponible
//Selector de emojis 
//Agrega la referencia al script de la biblioteca EmojiPicker  -->



<!-- 
            // conection to the db, after we do a consult to the db  we create a input to charge the images in the forum
            // After we how the iamages in the forum page more precise a the Answers section, we add a Emoji EmojiPicker
            //After we add a script to get the libary of the Emoji Picker. -->