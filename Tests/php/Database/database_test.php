<?php
require 'Database.php'; // On import la classe Database.php pour pouvoir l'utiliser dans notre code.
/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 07/03/2019
 * Time: 19:43
 */
$db = new Database('BDD_Projet'); // Création d'une instance Database ---> on rentre le nom de la base de données en argument.
$data = $db->request('SELECT * FROM theme WHERE Etat_theme = 0'); // On demande une requête à la méthode request de la classe Database.
$name = $data{0}; // Il faut choisir dans le tableau la valeur que vous voulez afficher. Il est conseillé de voir les indices avec var_dump($data).
echo $name['Nom_theme']; //echo renvoie ce qui est contenu dans l'attribut 'Nom_theme'.
//var_dump($data);
