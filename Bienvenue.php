<html>
    <head>
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
         session_start() ?>
        <link href="css/bienvenue.css" rel="stylesheet" media="screen">
        <title>Bienvenue</title>
    </head>

    <body>
        

        <p>Votre inscription c'est fait avec succès</p>

        <a href="index.php">Revenir sur le site</a>
        <br>
        <br>
        <a href="login.php">Se connecter</a>
    </body>
</html>