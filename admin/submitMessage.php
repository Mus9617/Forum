<?php

$pseudo = $_POST['pseudo'];
$comment = $_POST['comment'];
// conection a la base de donnes
$db = new PDO('mysql:host=localhost;dbname=villes_tests', 'root', '');
// Obtien la marque de l'heure
$timestamp = time();
// Passer le temps en D/M/Y
$date = date('d/m/Y', $timestamp);
// Preparar la consulta SQL
$query = "INSERT INTO blog (bg_pseudo, bg_commentaire, bg_validate, bg_date) VALUES (:pseudo, :comment, 0, :date)";
$stmt = $db->prepare($query);
// Executer la requete dans la SQL
$stmt->execute(array(':pseudo' => $pseudo, ':comment' => $comment, ':date' => $date));
// Redirection a la SQL
header("Location: blog.php");
exit();