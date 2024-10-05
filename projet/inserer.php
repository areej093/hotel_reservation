<?php

$db = mysql_connect('localhost', 'root', '') or die("Erreur de connexion");
// On sélectionne votre base..
mysql_select_db('hotel', $db) or die("Erreur de connexion base");

// Récupération des valeurs du formulaire
$a = $_POST['CIN'];
$b = $_POST['Name'];
$c = $_POST['phone'];
$d = $_POST['Email'];
$e = $_POST['Mess'];

if (strlen($a) == 8 && strlen($c) == 8 && isValidEmail($d) /*&& strpos($d, '@gmail.com') !== false*/) {
    $result = mysql_query("DELETE FROM contact WHERE CIN = '$a'") or die("Erreur delete " . mysql_error());
    mysql_query("INSERT INTO contact (CIN, nom, telephone, Email, messagee) VALUES ('$a', '$b', '$c', '$d', '$e')") or die("Erreur insert " . mysql_error());
    echo "Insertion réussie !";
} else {
    echo " Veuillez vérifier vos données.";
}
mysql_close();
function isValidEmail($email)
{
    return strpos($email, '@') !== false && strpos($email, '@gmail.com') !== false;
}

?> 