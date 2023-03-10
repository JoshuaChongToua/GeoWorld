<html>
    <head>
        <?php session_start(); 
        require_once("header.php");
        require_once("inc/manager-db.php");
        require_once("inc/connect-db.php");
        require_once("javascripts.php");?>
    </head>

    <body>

    <?php global $pdo;
      $recherche=$pdo->query('SELECT * from country');
      if(isset($_GET['pays']) AND !empty($_GET['pays'])){
        $q=htmlspecialchars($_GET['pays']);
        $recherche=$pdo->query('SELECT * from country WHERE Name like "'.$q.'%" ORDER BY id DESC');
      }
      ?>

    <table class="table">
         <tr>
           <th>Nom</th>
           <th>Population</th>
           <th>Capitale</th>
           <th>Langues parlées</th>

         </tr>
        <?php 
        $name = $_GET['pays'];
        $recherche = getRecherche($name);
        foreach($recherche as $val): ?>
            <td><?php echo $val->Name; ?></td> 
            <td><?php echo $val->Population; ?></td> 
            <?php $cap=$val->Capital;
            $capitale = getCapital($cap); 
            if(empty($capitale)): ?>
                <td style="color:#C6C4C4";> VIDE </td>
            <?php endif; ?>
            <?php if(!empty($capitale)): ?>
                <td> <?php echo $capitale[0]->Name ?></td>
            <?php endif; ?>

            <?php 
            $nomPays=$val->Name;
            $langue=getLangue($nomPays);
            foreach($langue as $language):?>
                <?php $first_langue= $language->Name; ?>
                <?php break; ?>
                <?php endforeach?>
                
                <?php if(empty($langue)): ?>
                  <td style="color:#C6C4C4";> VIDE </td>
                <?php endif;?>

                <?php if(!empty($langue)): ?>
                <td> <span class="conteneur"><span class="objet_vise"><?php echo"$first_langue ..." ?> </span><div class="infobulle">
                <?php foreach($langue as $language):?>
                <?php echo "- $language->Name" ?> <br>
                <?php endforeach?>
                </div></span> </td>

                <?php endif; ?>
        
        <?php endforeach ?>
    </body>
</html>