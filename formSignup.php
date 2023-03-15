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
   
     require_once "inc/manager-db.php"; ?>
    

    <link href="css/inscription.css" rel="stylesheet" media="screen">
    
    <form method="get" action="Signup.php">
        Nom : <input type="text" name="nom" class="nom" required placeholder="Name" autocomplete="off"><br>
        Prenom : <input type="text" name="prenom" required placeholder="First Name" autocomplete="off"><br>
        Login:<input type="text" name="login" required placeholder="Login" autocomplete="off"><br>
        MDP:<input type="password" name="password" required placeholder="Password" autocomplete="off"><br>
        
        

        
    



        <input type="hidden" name="role" value="visiteur">
        <input type="submit" name="submit" value="VALIDER">
        <input type="reset" value="EFFACER" /> 

        
    
    </form>








</html>