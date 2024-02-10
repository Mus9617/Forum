<?php
session_start();

$open = false;
$password = "159874";

if (isset($_POST['password'])) {
    if ($_POST['password'] === $password) {
        $_SESSION['login'] = 'ok';
    }
}
if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] == 'ok') {
        $open = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./lofeoo.css">
    <title>Panel De Administractión</title>
</head>

<body>
    <center>
        <div class="logeo">

            <?php

            if (!$open) {
                echo '

                <center> 
                    <h1>Panel Admin</h1>
                <form class="logeo" action="index.php" method="POST">
                            <input type="password" name="password">
                            <input type="submit" name="submit" value="LOGIN">
                            <a href="blog.php">No Eres Admin</a>
                        
                            </form> </center>';
            } else {
                ?>

                <h1>Panel De Administractión<</h1>

                <a href="deco.php">Salir</a>

                <ul>
                   
                    <li>
                        <a href="manage_blog.php">Gestion del  Blog</a>

                    </li>

                    <li>
                        <a href="messageForm.php">Escribir Mensaje</a>

                    </li>


                    <li>
                        <a href="blog.php">Blog</a>
                    </li>


                </ul>

                <?php

            }
            ?>
        </div>
    </center>
</body>

</html>