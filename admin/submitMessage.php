<?php

$pseudo = $_POST['pseudo'];
$comment = $_POST['comment'];

$db = new PDO('mysql:host=localhost;dbname=villes_tests', 'root', '');

$timestamp = time();

$date = date('Y-m-d H:i:sW', $timestamp);

$query = "INSERT INTO blog (bg_pseudo, bg_commentaire, bg_validate, bg_date) VALUES (:pseudo, :comment, 0, :date)";
$stmt = $db->prepare($query);

$stmt->execute(array(':pseudo' => $pseudo, ':comment' => $comment, ':date' => $date));

header("Location: blog.php");
exit();




/// Hacemos conexion base de datos obtenemos la hora transformamos la hora,,
/// preparamos la consulta a la base de datos,ejecutamos una raqet a la sql,
/// despues hacemos una redireccion hacia el blog///