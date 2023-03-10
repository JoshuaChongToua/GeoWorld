<?php
session_start ();
 require_once("inc/connect-db.php");
 require_once("inc/manager-db.php");
 

 //on récupère et on vérifie que l'id figure dans l'URL
if ( $_SESSION['role']=='admin'){
    $id = $_GET['id'] ;
    $salarie = getSalarie($id);
}
else{
    $salarie= getSalarie($_SESSION['identifiant']);
}

?>
<form action="updateutil.php" method="get" >
<fieldset>
<legend> <i>Utilisateur</i></legend>
Nom :
<input type="text" name="nom" required value="<?php echo $salarie->nom; ?>" /> <br />
Prénom :
<input type="text" name="prenom" required value="<?php echo $salarie->prenom; ?>" /> <br />

Login:
<input type="text" name="login" value="<?php echo $salarie->login; ?>"/> <br />

Role:
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