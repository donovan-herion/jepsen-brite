<?php

try {
    //PDO DATABASE CONNECTION
    include '../pdo.php';
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['submitSignup'])) {

    $FirstName = htmlspecialchars($_POST['FirstName']);
    $LastName = htmlspecialchars($_POST['LastName']);
    $Email = htmlspecialchars($_POST['Email']);
    $Mdp = sha1($_POST['Mdp']);
    $confirmationMdp = sha1($_POST['confirmationMdp']);

    // on verifie que les cases ne sont pas vide

    if (!empty($_POST['FirstName']) and !empty($_POST['LastName']) and !empty($_POST['Email']) and !empty($_POST['Mdp']) and !empty($_POST['confirmationMdp'])) {

        $FistNamelength = strlen($FistName);
        $LastNamelength = strlen($LastName);

        if ($FistNamelength <= 255 and $FistNamelength <= 255) {
            if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $bdd->prepare("SELECT * FROM persons WHERE Email = ?");
                $reqmail->execute(array($Email));
                $mailexist = $reqmail->rowCount();
                if ($mailexist == 0) {
                    if ($Mdp == $confirmationMdp) {
                        $insertmbr = $bdd->prepare("INSERT INTO persons(FirstName, LastName, Email, Mdp) VALUES(?, ?, ?, ?)");
                        $insertmbr->execute(array($FirstName, $LastName, $Email, $Mdp));
                        $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                        header('location: mail.php');
                    } else {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                    }
                } else {
                    $erreur = "Adresse mail déjà utilisée !";
                }
            } else {
                $erreur = "Votre adresse mail n'est pas valide !";
            }
        } else {
            $erreur = "Votre Prenom et Nom ne doivent pas dépasser 255 caractères !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>



<!-- // $requete = $bdd->prepare('INSERT INTO User (fist_name, last_name, email) VALUES(:fist_name, :last_name, :email)'); 

// $requete->execute(array(
//     'fist_name' => $fist_name,
//     'last_name' => $last_name,
//     'email' => $email

// ));

// echo "page post";
// Puis rediriger vers 
// header('Location: profilValider.php'); -->