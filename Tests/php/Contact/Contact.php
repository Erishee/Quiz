<?php
/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 09/03/2019
 * Time: 15:32
 */

if(isset($_POST['submit'])){


    /*----------------------------------------------------*/

    $to = 'superql2d2@gmail.com'; // Email qui reçoit les messages.

    $headers = "From: SuperQ! < superql2d2@gmail.com >\n"; // Le format du headers est par convention comme ceci d'après la docuementation PHP, j'ai pris le même.
    $headers .= 'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset='utf-8'\n";

    $message=''; // La variable qui va contenir le message de l'utilisateur.

    $errorsMail=0; // Une variable qui sert à la condition d'envoie du mail, elle est incrementer à chaque erreur de +1, si elle vaut 0 à la fin du formulaire on envoie le message !
    /*----------------------------------------------------*/

    /*
     *  Je récupère le contenu de l'objet. (On vérifie qu'il n'est pas vide avant)
     */

    if (!empty($_POST['Objet'])) {
        $subject = '<p>'.$_POST['Objet'].'</p>';
    }

    /*--------------------------------------------------------------------------------------*/

    /*
     *  Je récupère le contenu du message. (On vérifie qu'il n'est pas vide avant)
     */

    if (!empty($_POST['message'])) {
        $message = '<p>'.$_POST['message'].'</p>';
    }
    else {
        echo '<br></br>'."Vous n'avez pas saisie votre message !".'<br></br>';
        $errorsMail++;
    }

    /********************************************************************************************/

    /*
     * Je récupère le contenu du message. (On vérifie qu'il n'est pas vide avant).
     * filter_var permet de vérifier la validité d'un élément, ici on utilise le deuxieme arguement FILTER VALIDATE MAIL pour dire qu'on a besoin de filtrer un mail.
     *
     */

    if (!empty($_POST['email'])) {
        if ((filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) === false ) {
            echo '<br></br>'."Votre adresse mail n'est pas du format attendu !".'<br></br>';
            $errorsMail++;
        }
    }
    else{
        echo '<br></br>'."Vous n'avez pas saisie votre adresse mail !".'<br></br>';
        $errorsMail++;
    }

    /*
     *  Envoie avec la fonction mail, seulement si $errorsMail = 0.
     */

    if($errorsMail === 0) {
        mail($to, $subject, $message, $headers);
        echo '<br></br>' . "Message transmis avec succès !" . '<br></br>';
    }

    else {
        echo '<br></br>'." Le message n'est pas transmis, veuillez recommencer !".'<br></br>';
    }

    /*--------------------------------------------------------------------------------------*/
}?><!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
</head>

<body>
<link rel="stylesheet" href="../../css/boutoncontact_test.css">
<link rel="stylesheet" href="../../css/stylecontact_test.css">

<a href="#openModal" class="boutoncontact">NOUS CONTACTER</a>

<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Close" class="close">fermer</a>
        <br><h1>Contactez-nous !</h1><br>

        <form method="post" action="">
            <label for="email"  ></label>
            <input type="email" id="email" name="email" size="50" maxlength="100" placeholder="Votre adresse mail" >
            <br>
            <label for="objet" ></label>
            <select id="Objet" name="Objet" >
                <option value="thematiques">Thématematiques</option>
                <option value="inscriptionConnexion">Problème de connexion/inscription</option>
                <option value="autre">Autre</option>
            </select>
            <label for="message"></label>
            <textarea type="text" id="message" name="message"  style="height:200px" maxlength="1000" placeholder="Laissez votre message ici !"></textarea>
            <br><br>
            <input type="submit" value="Soumettre" class="boutoncontact" name="submit">

        </form>
    </div>
</div>

</body>

</html>

