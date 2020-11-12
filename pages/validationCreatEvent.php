<?php

session_start();

include '../Parsedown.php';
$Parsedown = new Parsedown();

try {
    //PDO DATABASE CONNECTION
    include '../pdo.php';
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_SESSION['Personid'])) {
    $req = $bdd->prepare('INSERT INTO evenements(Title, dt, hr, Img, Dsc, Category, Personid) VALUES(:Title, :dt, :hr, :Img, :Dsc, :Category, :Personid)');
    $req->execute(array(
        'Title' => $_POST['title'],
        'dt' => $_POST['start-event'],
        'hr' => $_POST['startTime'],
        'Img' => $_POST['image'],
        'Dsc' => $Parsedown->line($_POST['description']),
        'Category' => $_POST['event'],
        'Personid' => $_SESSION['Personid']
    ));
}

if ($req) {
    header('location: page-creatEvent.php?req=true');
} else {
    header('location: page-creatEvent.php?req');
}
