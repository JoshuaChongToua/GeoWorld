<html>
    <head>
    
    </head>

    <body>
        
    
                <?php
                session_start ();
                require("inc/manager-db.php");
                
                

                //on récupère et on vérifie que l'id figure dans l'URL
                if ( $_SESSION['role']=='admin' || $_SESSION['role']=='prof' ){
                    $id = $_GET['id'] ;
                    $nomPays = getCountry($id);
                }
                else{
                    $nomPays= getCountry($_SESSION['identifiant']);
                }

                $cap=$nomPays->Capital;
                $capitale = getCapital($cap);
                foreach($capitale as $val){
                    $nomCap= $val->Name;
                }


                ?>
                <form action="updatepays.php" method="get" >
                <fieldset>
                <legend> <i>Pays</i></legend>
                Nom :
                <input type="text" name="Name" required value="<?php echo $nomPays->Name; ?>" /> <br />
                Population :
                <input type="text" name="Population" required value="<?php echo $nomPays->Population; ?>" /> <br />
                Capital:
                <input type="text" name="Capital" value="<?php echo $nomCap; ?>"/> <br />

                <input type="hidden" name="id" value="<?php echo $nomPays->id; ?>">


                <fieldset>
                <input type="hidden" name="continent" value="<?php echo $cont; ?>">
                <input type="submit" value="mettre à jour" />
                <input type="reset" value="Effacer" />
                </form>

    </body>

</html>