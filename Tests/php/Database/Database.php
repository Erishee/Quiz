<?php
/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 06/03/2019
 * Time: 19:42
 */


class Database
{

    private $db_name; // Variable qui doit contenir le nom de la base de données.
    private $db_user; // Variable qui contient le nom de l'user, root par défaut en local.
    private $db_password; // Variable qui contient le mot de passe pour avoir accès à la base de données, root par défaut.
    private $db_host; // Variable qui contient l'adresse IP du serveur, rien dedans pour l'instant car nous sommes en local.
    private $pdo;


    /****************************************************************************************************************************************************************/



    public function __construct($db_name = 'BDD_Projet', $db_user = 'root', $db_password = '', $db_host = '')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_host = $db_host;

    }

    /****************************************************************************************************************************************************************/


    public function getPDO() 
    {
        if ($this->pdo === null) { // Pour éviter plusieurs appel PDO, on utilise la boucle pour éviter plusieurs instances? Si PDO est null on rentre dans la boucle.
            try {
                $pdo = new PDO('mysql:dbname=BDD_Projet;host=localhost', 'root', ''); // Instance de la classe PDO.
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Traitement des erreurs contrôlé.
                $this->pdo = $pdo; // Garde l'instance dans $pdo.
            } catch (PDOException $e) {
                echo 'La connection a échoué(PDO).'.$e->getMessage(); // Try,catch pour gérer les problemes de connexion avec PDO.
            }
        }

        return $this->pdo;
    }
    /****************************************************************************************************************************************************************/

    public function request($requete) // L'argument de la méthode contient la requête SQL.
    {
        $data = $this->getPDO()->query($requete); // L'execution de la requête ce fait avec query, on insère la requete dedans.
        $result = $data->fetchAll(); // On fait marcher la requête avec fetchAll, et on le met dans une variable $result.
        return $result; // On retourne le résultat de la requuête.
    }
}

    /****************************************************************************************************************************************************************/
