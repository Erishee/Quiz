<?php


/*
 * ---------------------------------------------------------------------------------------------------------------------
 *                                         Trophies PHP.
 *
 *Les trophées sont uniques aux thèmes par défaut, il existe donc 10 trophées !
 *Le système est simple : FINIR LES 5 NIVEAUX D'UN THEME DEBLOQUE UN TROPHEE !
 *Il est donc question de comparer le score d'un utilisateur pour savoir si il peut avoir les différents trophées.
 *
 * La table score_thème contient le score de l'utilisateur.
 *
 * Si score_thème pour le thème X est égale à 5, on affiche le trophée, sinon rien ne s'affiche...
 *
 * ---------------------------------------------------------------------------------------------------------------------
 */

session_start();

require '../Database/Database.php';


/*

AFFICHER DES INFORMATION SUR LA SESSION AVEC :

echo("<pre>") ;
print_r($_SESSION) ;
echo("</pre>") ;

*/


/*
 * getUserPseudo renvoie le pseudo de l'utilisateur qui se connecte.
 */

function getUserPseudo(){
    if(isset($_SESSION['auth'])){
        $db = new Database('BDD_Projet');
        $data = $db->request('SELECT * FROM utilisateur WHERE id_Utilisateur="'.$_SESSION['auth']['id_Utilisateur'].'"');
        $user = $data{0};
    }

    return $user['Pseudo'];

}

/*
 * getUserID renvoie l'ID de l'utilisateur qui se connecte.
 *
 */

function getUserID(){
    if(isset($_SESSION['auth'])){
        $db = new Database('BDD_Projet');
        $data = $db->request('SELECT * FROM utilisateur WHERE id_Utilisateur="'.$_SESSION['auth']['id_Utilisateur'].'"');
        $user = $data{0};
    }

    return $user['id_Utilisateur'];

}

/*
 * getUserScoreTheme renvoie un score de theme d'un utilisateur dans la table Score_theme, elle prend en arguement la clef primaire d'un theme, c'est à dire son ID.
 *
 */

function getUserScoreTheme($idtheme){
    $db = new Database('BDD_Projet');
    $data_score = $db->request('SELECT Score_theme FROM Score_theme WHERE Theme_id_Theme ="'.$idtheme.'" AND Utilisateur_id_Utilisateur ="'.getUserID().'"');
    if (isset($data_score{0})){
        $score_user = $data_score{0};
        $score_user['Score_theme'];
        //var_dump($score_user);
        return $score_user['Score_theme'];
    }

}

/*
 * giveTrophies compare le score est affiche un trophée si le score est égale à 5 dans un theme.
 */

function giveTrophies(){

    if((getUserScoreTheme(0)) == 5 ){
        echo '<img width ="150px height="500px" src="SPORT.svg" />';
    }
    if((getUserScoreTheme(1)) == 5 ){
        echo '<img width ="150px height="500px" src="GEEK.svg" />';
    }
    if((getUserScoreTheme(2)) == 5 ){
        echo '<img width ="150px height="500px" src="MUSIQUE.svg" />';
    }
    if((getUserScoreTheme(3)) == 5 ){
        echo '<img width ="150px height="500px" src="FILM.svg" />';
    }
    if((getUserScoreTheme(4)) == 5 ){
        echo '<img width ="150px height="500px" src="HIST.svg" />';
    }
    if((getUserScoreTheme(5)) == 5 ){
        echo '<img width ="150px height="500px" src="GEO.svg" />';
    }
    if((getUserScoreTheme(6)) == 5 ){
        echo '<img width ="150px height="500px" src="GASTRONOMIE.svg" />';
    }
    if((getUserScoreTheme(7)) == 5 ){
        echo '<img width ="150px height="500px" src="ART.svg" />';
    }
    if((getUserScoreTheme(8)) == 5 ){
        echo '<img width ="150px height="500px" src="LITTERATURE.svg" />';
    }
    if((getUserScoreTheme(9)) == 5 ){
        echo '<img width ="150px height="500px" src="MYTHO.svg" />';
    }
}
