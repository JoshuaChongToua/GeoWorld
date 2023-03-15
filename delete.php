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
    require_once "inc/connect-db.php";
    //on récupère et on vérifie que l'id figure dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id=$_GET['id'];
        echo $id;
}


    $sql="DELETE FROM identification where id=:id;";

try{
        
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

        //On redirige vers la liste des salaries
        header("Location:listeUtilisateurs.php");
}
catch(Exception $e){
        die("erreur dans la requete ".$e->getMessage());
}

?>
