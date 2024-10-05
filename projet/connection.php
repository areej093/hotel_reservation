<?php

$db = mysql_connect('localhost', 'root', '') or die("erreur de connexion");
mysql_select_db('hotel', $db) or die("erreur de connexion base");

if (isset($_POST["submit"])) {
    $n = $_POST['Name'];
    $a = $_POST['ad'];
    $e = $_POST['ae'];
    $type = isset($_POST["type"]) && is_array($_POST["type"]) ? implode(",", $_POST["type"]) : "";//isset tthabt est ce que champ mwjoud wella w njmou nlgou plusieurs cases a cochet donc nhotouhm fi tableau w binthom ,

    mysql_query("INSERT INTO chambre (nbadulte, nbenfants, typecham) VALUES ('$a', '$e', '$type')") or die("erreur insert " . mysql_error());
}

mysql_close();
?>