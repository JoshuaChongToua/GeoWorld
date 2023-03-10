<?php
    require_once("inc/connect-db.php");
    //on récupère et on vérifie que l'id figure dans l'URL
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        echo $id;
    }


    $sql="DELETE FROM country where id=:id;";

    try{
        
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();

        //On redirige vers la liste des salaries
        header("Location:index.php");
    }
    catch(Exception $e){
        die ("erreur dans la requete ".$e->getMessage());
    }

?>
