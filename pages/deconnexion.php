<?php
session_start();
try {
    //PDO DATABASE CONNECTION
    include '../pdo.php';
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$_SESSION = array();
session_destroy();
header("Location: page-login.php");
