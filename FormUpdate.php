<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire de mise à jour d'un pays</title>
        <link rel="stylesheet"  href="css/form_update.css">
    </head>

    <body>
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
        session_start();
        require "inc/manager-db.php";

        //on récupère et on vérifie que l'id figure dans l'URL
        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'prof') {
            $id = $_GET['id'];
            $nomPays = getCountry($id);
        } else {
            $nomPays = getCountry($_SESSION['identifiant']);
        }

        $cap = $nomPays->Capital;

        $capitale = getCapital($cap);
        if (!empty($capitale)) {
            foreach ($capitale as $val) {
                $nomCap = $val->Name;
            }
        } else {
            $nomCap = "Vide";
        }
        ?>

        <form action="updatepays.php" method="get">
            <fieldset>
                
                <label>Nom :</label>
                <input type="text" name="Name" required value="<?php echo $nomPays->Name; ?>" /> <br />

                <label>Population :</label>
                <input type="text" name="Population" required value="<?php echo $nomPays->Population; ?>" /> <br />

                <label>Capital :</label>
                <input type="text" name="Capital" value="<?php echo $nomCap; ?>"/> <br />
                
                <input type="hidden" name="id" value="<?php echo $nomPays->id; ?>">
                <input type="hidden" name="continent" value="<?php echo $cont; ?>">
                <input type="submit" value="Mettre à jour" />
                <input type="reset" value="Effacer" />
            </fieldset>
        </form>
    </body>
</html>
