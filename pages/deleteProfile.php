 <?php
    session_start();
    try {
        //PDO DATABASE CONNECTION
        include '../pdo.php';
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    if (isset($_GET['Personid']) and $_GET['Personid'] > 0) {
        $deleteId = $_SESSION['Personid'];
        $delete = $bdd->prepare("DELETE FROM persons WHERE Personid = ?");
        $delete->execute(array($deleteId));

        header('Location: page-signup.php');
    }
    ?>