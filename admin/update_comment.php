<?php
// verification du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['comment_id'], $_POST['pseudo'], $_POST['comment'])) {
        $commentId = $_POST['comment_id'];
        $pseudo = $_POST['pseudo'];
        $commentText = $_POST['comment'];


        $db = new PDO('mysql:host=localhost;dbname=villes_tests', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "UPDATE blog SET bg_pseudo = :pseudo, bg_commentaire = :comment WHERE bg_id = :commentId";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $commentText, PDO::PARAM_STR);
        $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
        $stmt->execute();


        header("Location: manage_blog.php");
        exit();
    } else {

        echo "Manque du texte pour pouvpoire le change.";
    }
} else {

    echo "Pas recu l'ordre POST.";
}
