<?php
$db = mysql_connect('localhost', 'root', '') or die("Erreur de connexion");
mysql_select_db('hotel', $db) or die("Erreur de connexion base");

if (isset($_POST['valider'])) {
    if (!empty($_POST['nom1']) && !empty($_POST['pren1']) && !empty($_POST['email1']) && !empty($_POST['password'])) {
        $nom = $_POST['nom1'];
        $pren = $_POST['pren1'];
        $email = $_POST['email1'];
        $mdp = sha1($_POST['password']);

        if (strlen($_POST['password']) < 7) {
            $message = "Votre mot de passe est trop court.";
        } elseif (strlen($nom) > 50 || strlen($pren) > 50) {
            $message = "Votre nom ou prénom est trop long.";
        } else {
            $testmail = mysql_query("SELECT * FROM inscription WHERE email = '$email'");
            $controlmail = mysql_num_rows($testmail);

            if ($controlmail == 0) {
                $insertion = mysql_query("INSERT INTO inscription (nom, prenom, email, password) VALUES ('$nom', '$pren', '$email', '$mdp')");
                if ($insertion) {
                    $message = "Votre compte a été créé.";
                } else {
                    $message = "Erreur lors de la création du compte : " ;
                }
            } else {
                $message = "Désolé, mais cette adresse email a déjà un compte.";
            }
        }
    } else {
        $message = "Veuillez remplir tous les champs du formulaire.";
    }
}

mysql_close($db);
?>