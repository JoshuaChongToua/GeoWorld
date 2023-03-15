<html>
    <head>
    <link href="css/geoworld.css" rel="stylesheet" media="screen">
        <title>GeoWorld</title>
    </head>

    <body >
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
        require_once "header.php";
        require_once "javascripts.php";
        ?>

        <h1>Bienvenue sur GeoWorld</h1>

        <img class="planete"src="images/logo1.jpg" alt="">
    </body>

    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
</html>