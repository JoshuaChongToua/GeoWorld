<html>
    
    
    
    <?php require_once("inc/manager-db.php"); ?>

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