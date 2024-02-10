<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="message.css">
    <title>Escribir un mensaje</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Admin</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="contact.php">Contacto</a></li>
        </ul>
    </nav>
    <h1>Escribir Un Mensaje</h1>
    <form action="submitMessage.php" method="post">
        Pseudónimo: <input type="text" name="pseudo"><br>
        Comentario: <textarea name="comment" rows="5" cols="40"></textarea><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
