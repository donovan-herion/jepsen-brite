<?php

//PDO DATABASE CONNECTION
include '../pdo.php';

if (isset($_POST['modify-title'])) {
    $modifyEvent = $bdd->prepare("UPDATE evenements SET Title=?, dt=?, hr=?, Img=?, Dsc=?  WHERE EventId = ?");
    $modifyEvent->execute(array($_POST['modify-title'], $_POST['modify-dt'], $_POST['modify-hr'], $_POST['modify-img'], $_POST['modify-dsc'], $_POST['modify-eventid']));
    header('Location: ../index.php');
}
