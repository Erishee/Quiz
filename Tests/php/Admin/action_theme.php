<?php

require '../Database/Database.php';

//$db = new Database('BDD_Projet');

$mu = new mysqli('localhost','root','root','BDD_Projet');

if(isset($_POST['submit'])) {
    if(isset($_POST['Nom_theme']) || isset($_POST['Libelle_theme']) || isset($_POST['Status_theme']) ) {
        $sql = 'INSERT INTO `theme` (`id_Theme`, `Nom_theme`, `Libelle_theme`, `Etat_theme`) VALUES (NULL,"'.$_POST['Nom_theme'].'","'.$_POST['Libelle_theme'].'","'.$_POST['Status_theme'].'")';
        $mu->query($sql) or die($mu->error);

    }
    // INSERT INTO `theme` (`id_Theme`, `Nom_theme`, `Libelle_theme`, `Etat_theme`) VALUES (NULL,' . $nom_theme . ',' . $libelle_theme . ',' . $etat_theme . ');
    // "'.$_POST['Nom_theme'].'","'.$_POST['Libelle_theme'].'","'.$_POST['Status_theme'].'"');
}