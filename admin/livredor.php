<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="livredor.css">
    <title>Escribir un mensaje</title>
</head>

<body>
    <h1>ECRI UN MESSAGE</h1>
    <form id="messageForm" action="submitMessage.php" method="post">
        Pseudo: <input type="text" name="pseudo"><br>
        Comentaire: <textarea name="comment" rows="5" cols="40"></textarea><br>
        <input type="submit" value="Enviar" id="submitButton">
    </form>
<script src="script.js"></script>
</body>

</html>
