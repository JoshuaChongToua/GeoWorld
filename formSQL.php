<html>
    
    <link href="css/inscription.css" rel="stylesheet" media="screen">
    
    <form method="get" action="insertSQL.php">
        Nom : <input type="text" name="nom" class="nom"><br>
        Prenom : <input type="text" name="prenom"><br>
        Login:<input type="text" name="login"><br>
        MDP:<input type="password" name="password"><br>
        
        <input type="hidden" name="role" value="visiteur">
        <input type="submit" name="submit" value="Insérer">
        <input type="reset" value="Effacer" /> 
    </form>








</html>