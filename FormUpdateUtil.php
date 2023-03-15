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
 require_once "inc/connect-db.php";
 require_once "inc/manager-db.php";
 

 //on récupère et on vérifie que l'id figure dans l'URL
if ($_SESSION['role']=='admin') {
    $id = $_GET['id'] ;
    $salarie = getUtil($id);
} else {
    $salarie= getUtil($_SESSION['identifiant']);
}

?>
<link href="css/form_update_util.css" rel="stylesheet" media="screen">
<form action="updateutil.php" method="get" >
<fieldset>
<label>Nom : </label>
<input type="text" name="nom" required value="<?php echo $salarie->nom; ?>" /> <br />
<label>Prénom :</label>
<input type="text" name="prenom" required value="<?php echo $salarie->prenom; ?>" /> <br />

<label>Login:</label>
<input type="text" name="login" value="<?php echo $salarie->login; ?>"/> <br />

<label>Role:</label>
 <select name="role">
 <option value="prof">prof</option>
 <option value="eleve">eleve</option>
 <option value="admin">admin</option>
 </select>

<input type="hidden" name="id" value="<?php echo $salarie->id ?> ">
<fieldset>
<input type="submit" value="mettre à jour" />
<input type="reset" value="Effacer" />
</form>