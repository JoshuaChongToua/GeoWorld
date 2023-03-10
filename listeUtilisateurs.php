<html>
  <head>
    <link href="css/listeutils.css" rel="stylesheet" media="screen">
  </head>

  <body class="util">
      <?php
       
        //on se connecte à la base Adherent
        require_once("inc/connect-db.php");
        require_once("inc/manager-db.php");
        require_once("header.php");
        
        

        $listeSalaries = getAllSalaries();
        // Create connection
        
        if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
          echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."(".$_SESSION['role'].")";
          echo '<br><a href="./logout.php">Deconnexion</a></p>';
          }
        else{
          $_SESSION['role']='visiteur';
        }
        ?>


        


        <table border=2>
          <tr>
              <th>id</th>
              <th>nom</th>
              <th>prenom</th>
              <th>login</th>
              <th>role</th>
              <th>update</th>
              <th>delete</th>
          </tr>

          <?php
          $requete = "SELECT * FROM identification";
          $result=$pdo->query($requete);
          ?>

        
        <?php foreach($listeSalaries as $leSalarie):?>
            <tr>
              <td><?php echo $leSalarie->id;?> </td>
              <td><?php echo $leSalarie->nom; ?> </td>
              <td><?php echo $leSalarie->prenom;?></td>
              <td><?php echo $leSalarie->login;?> </td>
              
              <?php if($leSalarie->role=="visiteur"): ?>
                <td style="color:red"><?php echo $leSalarie->role;?> </td>
              
              <?php else: ?>
              <td><?php echo $leSalarie->role;?> </td>
              <?php endif; ?>
              
              <td><a href="FormUpdateUtil.php?id=<?php echo $leSalarie->id ?>">Update</a> </td>
                
              
              <td><a href="delete.php?id=<?php echo $leSalarie->id ?>">Delete</a> </td>
                
            </tr>
        <?php endforeach; ?>
        </table>

        <div class="ajouter-btn-container">
          <button class="ajouter-btn" onclick="location.href='formSQL.html'">Ajouter</button>
        </div>
              

       <?php 
        require_once 'javascripts.php';

      ?>
  </body>
        

</html>