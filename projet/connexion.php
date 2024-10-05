<?php
$db = mysql_connect('localhost', 'root', '') or die("Erreur de connexion");
mysql_select_db('hotel', $db) or die("Erreur de connexion base");

$email = isset($_POST['emailx']);
$password = isset($_POST['passwordx']);
//lazm les champs non vide
if (!empty($email) && !empty($password)) {

    //najm n9bl ken marra wahda un email donc lazm n3ml verification illi mafaamach l mail heka gbl
    $checkQuery = "SELECT * FROM conn WHERE mail = '$email'";
    $checkResult = mysql_query($checkQuery);

    if ($checkResult && mysql_num_rows($checkResult) == 0) {// mysql_num_rows t7sib nombre de lignes mt3  mail données 
        // mail mch mawjoud donc najmou n3mlou insertion fl base lil utilisateur ijdid 
        $insertQuery = "INSERT INTO conn (mail, mdp) VALUES ('$email', '$password')";
        $insertResult = mysql_query($insertQuery);

        if ($insertResult) {
            echo "Utilisateur inséré avec succès.";
        } else {
            echo "Erreur lors de l'insertion : " ;
        }
    } else {
        echo "Cet email est déjà enregistré. Veuillez utiliser un autre email.";
    }

} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}
mysql_close($db);
?>