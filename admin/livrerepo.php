<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== "ok") {
    header("location:index.php");

}

try {
    $db = new PDO('mysql:host=localhost;dbname=villes_tests', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "reussi";
} catch (PDOException $e) {
    die($e->getMessage());
}


