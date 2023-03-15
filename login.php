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
 // on teste si nos variables sont définies et remplies
if (isset($_POST['login']) && isset($_POST['pwd']) && !empty($_POST['login'])&& !empty($_POST['login'])) {
    // on appele la fonction getAuthentification en lui passant en paramètre le login et password
    //la fonction retourne les caractéristiques du salaries si il est connu sinon elle retourne false
    $result = getAuthentification($_POST['login'], $_POST['pwd']);
    //print_r($result);
    // si le résulat n'est pas false
    if ($result) {
        // on la démarre la session
        session_start();
        // on enregistre les paramètres de notre visiteur comme variables de session
        $_SESSION['nom'] = $result->nom;
        $_SESSION['identifiant'] = $result->idsalaries;
        $_SESSION['role'] = $result->role;
        // on redirige notre visiteur vers une page de notre section membre
        header('location: index.php');

    } else { //si le résultat est false on redirige vers la page d'authentification
    
        header('location: authentification.php');
        echo"login ou mot de passe incorrect";
    }
} else { //si nos variables ne sont pas renseignées on redirige vers la page d'authentification

    header('location: authentification.php');
    echo"login ou mot de passe incorrect";
}
?> 