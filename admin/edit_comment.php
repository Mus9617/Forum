<?php
if (isset($_GET['id'])) {
    $commentId = $_GET['id'];

    header("Location: edit_comment_form.php?id=" . $commentId);
    exit();
} else {
   
    echo "No se proporcionó un ID de comentario.";
}
?>