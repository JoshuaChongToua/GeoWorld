<html>
<?php
/**
 * Ce script est composé de fonctions d'exploitation des données
 * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
 *
 * C'est le seul endroit dans l'application où a lieu la communication entre
 * la logique métier de l'application et les données en base de données, que
 * ce soit en lecture ou en écriture.
 *
 * PHP version 7
 *
 * @category  Database_Access_Function
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2023 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

/**
 *  Les fonctions dépendent d'une connection à la base de données,
 *  cette fonction est déportée dans un autre script.
 */
require_once 'inc/manager-db.php';
//on récupère et on vérifie les données reçues par le formulaire
if (isset($_GET['nom']) && !empty($_GET['nom'])) {
    $nom = $_GET['nom'] ;
}
    // à faire sur chaque donnée reçue
    $prenom = $_GET['prenom'];
    $login= $_GET['login'];
    $pass= $_GET['password'];
    $role= $_GET['role'];
    // on rédige la requête SQL
    $sql = " INSERT into identification (nom, prenom, login, password, role )
    values (:nom, :prenom, :login, :password, :role)";
try {
    //on prépare la requête avec les données reçues
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':login', $login, PDO::PARAM_STR);
    $statement->bindParam(':password', $pass, PDO::PARAM_STR);
    $statement->bindParam(':role', $role, PDO::PARAM_STR);
    $statement->execute();
    //On renvoie vers la liste des salaries
    header("Location:Bienvenue.php");
}
catch(PDOException $e){
    echo 'Erreur : '.$e->getMessage();
}
?>



    
   
</html>