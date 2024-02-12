<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== "ok") {
    header("location:index.php");
    exit();
}


$db = new PDO('mysql:host=localhost;dbname=villes_tests', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM blog WHERE bg_validate = 0";
$stmt = $db->query($query);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/adminbg.css">
    <title>Administrar Blog</title>
</head>

<body>
    <h1>BLOG ADMIN ADMINISTRACIÓN</h1>
    <a href="index.php" class="atras">Volver Atras</a>
    <table>
        <tr>
            <th>Pseudo</th>
            <th>Comentaire</th>
            <th>Date</th>
            <th>Accion</th>
        </tr>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <td>
                    <?php echo $comment['bg_pseudo']; ?>
                </td>
                <td>
                    <?php echo $comment['bg_commentaire']; ?>
                </td>
                <td>
                    <?php echo $comment['bg_date']; ?>
                </td>
                <td>

                    <a href="validate_comment.php?id=<?php echo $comment['bg_id']; ?>">Valider</a>
                    <a href="edit_comment.php?id=<?php echo $comment['bg_id']; ?>">Editer</a>
                    <a href="delete_comment.php?id=<?php echo $comment['bg_id']; ?>">Suprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>