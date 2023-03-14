<?php
session_start ();
 require_once("inc/connect-db.php");
 require_once("inc/manager-db.php");
 

 //on récupère et on vérifie que l'id figure dans l'URL
if ( $_SESSION['role']=='admin'){
    $id = $_GET['id'] ;
    $salarie = getUtil($id);
}
else{
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